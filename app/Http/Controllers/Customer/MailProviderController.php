<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\MailProvider;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMailProviderRequest;
use App\Http\Requests\UpdateMailProviderRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Yajra\DataTables\Facades\DataTables;
use App\Services\MailProviders\MailProviderFactory;

class MailProviderController extends Controller
{
    use AuthorizesRequests;

    public function index(Request $request)
    {
        $this->authorize('viewAny', MailProvider::class);

        if ($request->ajax()) {
            $query = MailProvider::where('user_id', auth()->id());

            return DataTables::eloquent($query)
                ->addColumn('provider', fn($row) => $row->provider)
                ->addColumn('account_name', fn($row) => $row->account_name)
                ->addColumn('email', fn($row) => $row->settings['email'] ?? '')
                ->addColumn('created_at_blade', fn($row) =>
                    view('customer.mail_providers.datatableColumns.created_at_blade', compact('row'))
                )
                ->addColumn('actions', fn($row) =>
                    view('customer.mail_providers.datatableColumns.actions', ['mail_provider' => $row])
                )
                ->rawColumns(['created_at_blade', 'actions'])
                ->make(true);
        }

        return view('customer.mail_providers.index');
    }

    public function create()
    {
        $this->authorize('create', MailProvider::class);
        return view('customer.mail_providers.create');
    }

    public function store(StoreMailProviderRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = auth()->id();

        MailProvider::create([
            'user_id' => $validated['user_id'],
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

    public function edit(MailProvider $mailProvider)
    {
        $this->authorize('update', $mailProvider);
        return view('customer.mail_providers.edit', compact('mailProvider'));
    }

    public function update(UpdateMailProviderRequest $request, MailProvider $mailProvider)
    {
        $this->authorize('update', $mailProvider);

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

    public function show(MailProvider $mailProvider)
    {
        $this->authorize('view', $mailProvider);
        return view('customer.mail_providers.show', compact('mailProvider'));
    }

    public function destroy(MailProvider $mailProvider)
    {
        $this->authorize('delete', $mailProvider);
        $mailProvider->delete();

        return redirect()->route('customer.mail_providers.index')
            ->with('success', __('mail_providers.messages.deleted'));
    }

    public function test(int $id)
    {
        $mailProvider = MailProvider::where('user_id', auth()->id())->findOrFail($id);
        $this->authorize('view', $mailProvider);

        try {
            $settings = $mailProvider->settings;
            $settings['password'] = Crypt::decrypt($settings['password']);
            $mailProvider->settings = $settings;

            $mailer = MailProviderFactory::create($mailProvider);
            $mailer->sendEmail(
                auth()->user()->email,
                'Test Email from ' . config('app.name'),
                '<h1>This is a test email</h1><p>Your ' . $mailProvider->provider . ' configuration works 🎉</p>'
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
