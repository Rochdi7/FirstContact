<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMailProviderRequest;
use App\Models\MailProvider;
use App\Services\MailProviders\MailProviderFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class MailProviderController extends Controller

{
    use AuthorizesRequests;
    /**
     * Display a listing of the mail providers.
     */
    public function index()
    {
        if (request()->ajax()) {
            $data = MailProvider::where('user_id', Auth::id())->get();

            return datatables()->of($data)
                ->addColumn('created_at_blade', fn($row) => view('customer.mail_providers.datatableColumns.created_at_blade', compact('row')))
                ->addColumn('actions', fn($row) => view('customer.mail_providers.datatableColumns.actions', ['mail_provider' => $row]))
                ->rawColumns(['created_at_blade', 'actions'])
                ->make(true);
        }

        return view('customer.mail_providers.index');
    }

    /**
     * Show the form for creating a new mail provider.
     */
    public function create()
    {
        return view('customer.mail_providers.create');
    }

    /**
     * Store a newly created mail provider in storage.
     */
    public function store(StoreMailProviderRequest $request)
    {
        $validated = $request->validated();

        MailProvider::create([
            'user_id' => Auth::id(),
            'provider' => $validated['provider'],
            'account_name' => $validated['account_name'],
            'settings' => [
                'email' => $validated['email'],
                'password' => Crypt::encrypt($validated['password']),
            ]
        ]);

        return redirect()->route('customer.mail_providers.index')
            ->with('success', __('mail_providers.messages.created'));
    }

    /**
     * Show the form for editing the specified mail provider.
     */
    public function edit(MailProvider $mailProvider)
    {
        $this->authorize('edit', $mailProvider);

        return view('customer.mail_providers.edit', compact('mailProvider'));
    }

    /**
     * Update the specified mail provider in storage.
     */
    public function update(StoreMailProviderRequest $request, MailProvider $mailProvider)
    {
        $validated = $request->validated();

        $settings = $mailProvider->settings;
        $settings['email'] = $validated['email'];

        if (!empty($validated['password'])) {
            $settings['password'] = Crypt::encrypt($validated['password']);
        }

        $mailProvider->update([
            'provider' => $validated['provider'],
            'account_name' => $validated['account_name'],
            'settings' => $settings,
        ]);

        return redirect()->route('customer.mail_providers.index')
            ->with('success', __('mail_providers.messages.updated'));
    }

    /**
     * Remove the specified mail provider.
     */
    public function destroy(MailProvider $mailProvider)
    {
        $mailProvider->delete();

        return redirect()->route('customer.mail_providers.index')
            ->with('success', __('mail_providers.messages.deleted'));
    }

    /**
     * Send a test email using the selected provider.
     */
    public function test(int $id)
    {
        $provider = MailProvider::where('user_id', Auth::id())->findOrFail($id);

        try {
            $settings = $provider->settings;
            $settings['password'] = Crypt::decrypt($settings['password']);
            $provider->settings = $settings;

            $mailer = MailProviderFactory::create($provider);

            $mailer->sendEmail(
                Auth::user()->email,
                'Test Email from ' . config('app.name'),
                '<h1>This is a test email</h1><p>Your ' . $provider->provider . ' configuration works 🎉</p>'
            );

            return response()->json([
                'success' => true,
                'message' => 'Test email sent successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
