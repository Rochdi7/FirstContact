<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Password;
use App\Http\Resources\UserResource;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpMail;
use Illuminate\Support\Carbon;


class AuthController extends Controller
{
    /**
     * Handle login.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (! Auth::attempt($credentials)) {
            return response()->json([
                'message' => __('auth.failed'),
            ], 401);
        }

        $user = Auth::user();

        return $this->createTokenResponse($user, 'Login successful.');
    }

    /**
     * Handle registration.
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name'  => ['required', 'string', 'max:255'],
            'email'      => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'   => ['required', 'string', 'min:6', 'confirmed'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 422);
        }

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => strtolower($request->email),
            'password'   => Hash::make($request->password),
        ]);

        // Assign default role
        $user->assignRole('Customer');

        return $this->createTokenResponse($user, 'Registration successful.', 201);
    }

    /**
     * Handle forgot password.
     */
    public function forgotPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email', 'exists:users,email'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 422);
        }

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? response()->json(['message' => __($status)], 200)
            : response()->json(['message' => __($status)], 500);
    }

    /**
     * Handle logout.
     */
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json([
            'message' => 'Logged out successfully.',
        ], 200);
    }

    /**
     * Handle update profile.
     */
    public function updateProfile(Request $request)
    {
        $user = $request->user();

        $validator = Validator::make($request->all(), [
            'first_name' => ['sometimes', 'string', 'max:255'],
            'last_name'  => ['sometimes', 'string', 'max:255'],
            'phone'      => ['nullable', 'string', 'max:20'],
            'birthday'   => ['nullable', 'date_format:d-m-Y'],
            'gender'     => ['nullable', Rule::in(['male', 'female', 'other'])],
        ], [
            'birthday.date_format' => 'The birthday must be in DD-MM-YYYY format.',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors(),
            ], 422);
        }

        $validated = $validator->validated();

        if (isset($validated['birthday'])) {
            // Optional: convert birthday to Y-m-d if you store it as date in DB
            $validated['birthday'] = date('Y-m-d', strtotime(str_replace('/', '-', $validated['birthday'])));
        }

        $user->update($validated);

        // Update virtual name if needed
        $user->name = $user->first_name . ' ' . $user->last_name;
        $user->save();

        return (new UserResource($user))
            ->additional(['message' => 'Profile updated successfully.']);
    }

    /**
     * Return authenticated user as resource.
     */
    public function user(Request $request)
    {
        return new UserResource($request->user());
    }

    /**
     * Create token response with user resource.
     */
    protected function createTokenResponse(User $user, $message = null, $statusCode = 200)
    {
        $token = $user->createToken('api-token')->plainTextToken;

        return (new UserResource($user))
            ->additional([
                'token'   => $token,
                'message' => $message,
            ])
            ->response()
            ->setStatusCode($statusCode);
    }

    public function sendOtp(Request $request)
    {
        $request->validate(['email' => 'required|email|exists:users,email']);

        $user = User::where('email', $request->email)->first();

        $otp = random_int(100000, 999999);

        $user->update([
            'otp_code' => $otp,
            'otp_expires_at' => now()->addMinutes(10),
        ]);

        Mail::to($user->email)->send(new OtpMail($otp));

        return response()->json(['message' => 'Code envoyé à votre adresse email.'], 200);
    }

    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'otp_code' => ['required', 'digits:6'],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        $user = User::where('email', $request->email)->first();

        if (
            !$user ||
            $user->otp_code !== $request->otp_code ||
            now()->gt(Carbon::parse($user->otp_expires_at))
        ) {
            return response()->json(['message' => 'OTP invalide ou expiré'], 422);
        }

        $user->update([
            'password' => Hash::make($request->password),
            'otp_code' => null,
            'otp_expires_at' => null,
        ]);

        return response()->json(['message' => 'Mot de passe réinitialisé avec succès.'], 200);
    }
}
