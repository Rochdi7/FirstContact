<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MailProviderResource;
use App\Models\MailProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MailProviderController extends Controller
{
    public function index()
    {
        $providers = MailProvider::where('user_id', auth()->id())->get();

        return MailProviderResource::collection($providers)
            ->additional(['message' => 'Mail providers fetched successfully.']);
    }

    public function store(Request $request)
    {
        $userId = auth()->id();

        if (!$userId) {
            return response()->json([
                'message' => 'Unauthorized. No user authenticated.'
            ], 401);
        }

        $validator = Validator::make($request->all(), [
            'provider'      => ['required', 'string', 'max:255'],
            'account_name'  => ['required', 'string', 'max:255'],
            'settings'      => ['nullable', 'array'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        $validated = $validator->validated();

        $provider = MailProvider::create([
            'user_id'       => $userId,
            'provider'      => $validated['provider'],
            'account_name'  => $validated['account_name'],
            'settings'      => isset($validated['settings']) 
                                ? json_encode($validated['settings'])
                                : null,
        ]);

        return (new MailProviderResource($provider))
            ->additional([
                'message' => 'Mail provider created successfully.'
            ])
            ->response()
            ->setStatusCode(201);
    }

    public function show(MailProvider $mailProvider)
    {
        $this->authorizeMailProvider($mailProvider);

        return (new MailProviderResource($mailProvider))
            ->additional(['message' => 'Mail provider retrieved successfully.']);
    }

    public function update(Request $request, MailProvider $mailProvider)
    {
        $this->authorizeMailProvider($mailProvider);

        $validator = Validator::make($request->all(), [
            'provider'      => ['sometimes', 'required', 'string', 'max:255'],
            'account_name'  => ['sometimes', 'required', 'string', 'max:255'],
            'settings'      => ['nullable', 'array'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        $validated = $validator->validated();

        if (isset($validated['settings'])) {
            $validated['settings'] = json_encode($validated['settings']);
        }

        $mailProvider->update($validated);

        return (new MailProviderResource($mailProvider))
            ->additional(['message' => 'Mail provider updated successfully.']);
    }

    public function destroy(MailProvider $mailProvider)
    {
        $this->authorizeMailProvider($mailProvider);

        $mailProvider->delete();

        return response()->json([
            'message' => 'Mail provider deleted successfully.'
        ], 200);
    }

    protected function authorizeMailProvider(MailProvider $mailProvider)
    {
        if ($mailProvider->user_id !== auth()->id()) {
            abort(403, 'Unauthorized.');
        }
    }
}
