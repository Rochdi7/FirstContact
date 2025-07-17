<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMessageRequest;
use App\Http\Requests\UpdateMessageRequest;
use App\Jobs\SendMessageEmail;
use App\Models\Message;
use App\Models\MessageTemplate;
use App\Models\MailProvider;
use App\Models\Template;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Blade;

class MessageController extends Controller
{
    use AuthorizesRequests;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Message::class);

        if (request()->ajax()) {
            $query = Message::with(['template', 'messageTemplate', 'mailProvider', 'recipients.contact'])
                ->where('user_id', Auth::id());

            return DataTables::eloquent($query)
                ->addColumn('provider', fn($row) => optional($row->mailProvider)->provider ?? '-')
                ->addColumn('message_template', fn($row) => optional($row->messageTemplate)->name ?? '-')
                ->addColumn('layout_template', fn($row) => optional($row->template)->name ?? '-')
                ->addColumn(
                    'created_at_blade',
                    fn($row) =>
                    view('customer.messages.datatableColumns.created_at_blade', compact('row'))->render()
                )
                ->addColumn(
                    'actions',
                    fn($row) =>
                    view('customer.messages.datatableColumns.actions', ['message' => $row])->render()
                )
                ->rawColumns(['created_at_blade', 'actions'])
                ->make(true);
        }

        return view('customer.messages.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Message::class);

        $messageTemplates = MessageTemplate::where('user_id', Auth::id())->pluck('name', 'id');
        $mailProviders = MailProvider::where('user_id', Auth::id())->pluck('account_name', 'id');
        $contacts = Contact::where('user_id', Auth::id())->get();
        $templates = Template::pluck('name', 'id');

        return view('customer.messages.create', compact(
            'messageTemplates',
            'mailProviders',
            'contacts',
            'templates'
        ));
    }

    /**
     * Store a newly created resource in storage and queue the message for sending.
     */
    public function store(StoreMessageRequest $request)
    {
        $this->authorize('create', Message::class);

        $validated = $request->validated();
        Log::info('Storing message with validated data: ', $validated);

        $message = null;

        DB::transaction(function () use ($validated, &$message) {
            $message = Message::create([
                'user_id' => Auth::id(),
                'message_template_id' => $validated['message_template_id'] ?? null,
                'mail_provider_id' => $validated['mail_provider_id'],
                'template_id' => $validated['template_id'] ?? null,
            ]);

            foreach ($validated['recipients'] as $contactId) {
                $message->recipients()->create(['contact_id' => $contactId]);
            }
        });

        $action = $request->input('action');
        Log::info('Action received: ' . $action);

        if ($action === 'save_send') {
            try {
                Log::info('Dispatching email job for message ID: ' . $message->id);
                SendMessageEmail::dispatch($message);
                Log::info('Email job dispatched successfully for message ID: ' . $message->id);
            } catch (\Exception $e) {
                Log::error('Failed to dispatch email job for message ID ' . $message->id . ': ' . $e->getMessage());
                return redirect()
                    ->route('customer.messages.index')
                    ->with('error', 'Message saved, but email job dispatch failed: ' . $e->getMessage());
            }
        }

        if ($action === 'save_send') {
            return redirect()
                ->route('customer.messages.show', $message->id)
                ->with('success', __('messages.messages.created') . ' and queued for sending');
        }

        return redirect()
            ->route('customer.messages.index')
            ->with('success', __('messages.messages.created'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $message = Message::with([
            'template',
            'messageTemplate',
            'mailProvider',
            'recipients.contact',
        ])
            ->where('user_id', Auth::id())
            ->findOrFail($id);

        $this->authorize('view', $message);

        return view('customer.messages.show', compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $message = Message::where('user_id', Auth::id())->findOrFail($id);
        $this->authorize('update', $message);

        $messageTemplates = MessageTemplate::where('user_id', Auth::id())->pluck('name', 'id');
        $mailProviders = MailProvider::where('user_id', Auth::id())->pluck('account_name', 'id');
        $contacts = Contact::where('user_id', Auth::id())->get();
        $selectedRecipients = $message->recipients()->pluck('contact_id')->toArray();
        $templates = Template::pluck('name', 'id');

        return view('customer.messages.edit', compact(
            'message',
            'messageTemplates',
            'mailProviders',
            'contacts',
            'selectedRecipients',
            'templates'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMessageRequest $request, $id)
    {
        $message = Message::where('user_id', Auth::id())->findOrFail($id);
        $this->authorize('update', $message);

        $validated = $request->validated();
        Log::info('Updating message with validated data: ', $validated);

        DB::transaction(function () use ($message, $validated) {
            $message->update([
                'message_template_id' => $validated['message_template_id'] ?? null,
                'mail_provider_id' => $validated['mail_provider_id'],
                'template_id' => $validated['template_id'] ?? null,
            ]);

            $message->recipients()->delete();
            foreach ($validated['recipients'] as $contactId) {
                $message->recipients()->create(['contact_id' => $contactId]);
            }
        });

        return redirect()
            ->route('customer.messages.index')
            ->with('success', __('messages.messages.updated'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $message = Message::where('user_id', Auth::id())->findOrFail($id);
        $this->authorize('delete', $message);
        $message->delete();

        return redirect()
            ->route('customer.messages.index')
            ->with('success', __('messages.messages.deleted'));
    }

    /**
     * Preview the message template.
     */
    public function preview($id)
    {
        $message = Message::with(['template', 'messageTemplate', 'recipients.contact'])
            ->where('user_id', Auth::id())
            ->findOrFail($id);

        $this->authorize('view', $message);

        // Use default template if none is selected
        $viewPath = $message->template->view_path ?? 'templates.default';

        if (!view()->exists($viewPath)) {
            abort(404, 'Template view not found: ' . $viewPath);
        }

        $recipient = $message->recipients->first()?->contact;
        $recipientName = $recipient
            ? $recipient->first_name . ' ' . $recipient->last_name
            : 'User';

        $variables = $this->prepareTemplateData($message, $recipientName);

        $bodyHtml = Blade::render($message->messageTemplate->body, $variables);

        return view($viewPath, [
            'subject' => $message->messageTemplate->subject,
            'body' => $bodyHtml,
            'sender_name' => Auth::user()->name,
        ]);
    }



    /**
     * Prepare data for the template rendering.
     */
    protected function prepareTemplateData($message, $recipientName)
    {
        $template = $message->template;

        return match (optional($template)->view_path) {
            'emails.templates.event' => [
                'recipient_name' => $recipientName,
                'event_title' => $template?->name ?? 'Event Reminder',
                'event_date' => now()->addDays(15)->format('Y-m-d'),
                'event_location' => 'TBD',
            ],
            'emails.templates.invoice' => [
                'invoice_number' => 'INV-' . str_pad($message->id, 3, '0', STR_PAD_LEFT),
                'invoice_date' => now()->format('Y-m-d'),
                'customer_name' => $recipientName,
                'items' => [
                    ['name' => 'Item A', 'quantity' => 1, 'price' => 50.00],
                ],
                'subtotal' => 50.00,
                'tax' => 5.00,
                'total' => 55.00,
            ],
            'emails.templates.hackathon' => [
                'recipient_name' => $recipientName,
                'event_name' => $template?->name ?? 'Hackathon Invite',
                'event_date' => now()->addDays(30)->format('Y-m-d'),
                'event_location' => 'Online',
                'registration_link' => 'https://firstcontact.com/register',
            ],
            'emails.templates.announcement' => [
                'recipient_name' => $recipientName,
                'announcement_title' => $template?->name ?? 'General Announcement',
                'announcement_body' => 'This is a general announcement.',
            ],
            'emails.templates.offer' => [
                'recipient_name' => $recipientName,
                'offer_details' => 'Limited time discount on all services!',
                'expiry_date' => now()->addDays(7)->format('Y-m-d'),
            ],
            default => [
                'recipient_name' => $recipientName,
                'message_content' => 'Default message content.',
            ],
        };
    }
}
