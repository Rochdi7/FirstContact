<?php

namespace App\Jobs;

use App\Models\MailProvider;
use App\Models\Message;
use App\Services\MailProviders\MailProviderFactory;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;

class SendMessageEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $message;

    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    public function handle()
    {
        // Step 1: Determine mail provider (fallback to default if missing)
        $providerId = $this->message->mail_provider_id;

        if (!$providerId) {
            $providerId = config('mail.default_provider_id') ?? env('MAIL_DEFAULT_PROVIDER_ID');
            Log::info("Fallback mail provider applied: {$providerId}");
        }

        // Step 2: Load mail provider
        $mailProvider = MailProvider::find($providerId);

        if (!$mailProvider) {
            Log::critical("MailProvider ID [$providerId] not found.");
            return;
        }

        // Step 3: Decrypt password
        try {
            $settings = $mailProvider->settings;
            $settings['password'] = Crypt::decrypt($settings['password']);
            $mailProvider->settings = $settings;
        } catch (\Throwable $e) {
            Log::error("Failed to decrypt password for MailProvider ID [$providerId]: " . $e->getMessage());
            return;
        }

        // Step 4: Resolve mailer
        $mailer = MailProviderFactory::create($mailProvider);
        if (!$mailer) {
            Log::error("No mailer could be created for provider ID [$providerId]");
            return;
        }

        // Step 5: Prepare email content
        $templateContent = $this->getTemplateContent();

        // Step 6: Send to each recipient
        foreach ($this->message->recipients as $recipient) {
            $contact = $recipient->contact;
            if (!$contact || !$contact->email) {
                Log::warning("Missing contact or email for recipient ID: {$recipient->id}");
                continue;
            }

            try {
                $mailer->sendEmail(
                    $contact->email,
                    $this->message->messageTemplate->subject,
                    $templateContent
                );

                Log::info("Email sent to {$contact->email} for message ID: {$this->message->id}");
            } catch (\Throwable $e) {
                Log::error("Failed to send email to {$contact->email}: " . $e->getMessage());
            }
        }
    }

    protected function getTemplateContent()
    {
        $template = $this->message->template;
        $viewPath = $template?->view_path;

        if (!$viewPath || !view()->exists($viewPath)) {
            Log::warning("Missing or invalid view path '{$viewPath}', using fallback 'templates.default'");
            $viewPath = 'templates.default';
        }

        if (!view()->exists($viewPath)) {
            Log::critical("Fallback template view 'templates.default' is missing!");
            return '<strong>Template not found.</strong>';
        }

        $recipient = $this->message->recipients->first()?->contact;
        $recipientName = $recipient ? $recipient->first_name . ' ' . $recipient->last_name : 'User';

        $data = $this->prepareTemplateData($recipientName);

        try {
            $renderedBody = Blade::render($this->message->messageTemplate->body, $data);
        } catch (\Throwable $e) {
            Log::error("Failed to render message template body: " . $e->getMessage());
            $renderedBody = 'Unable to render message body.';
        }

        return view($viewPath, [
            'subject' => $this->message->messageTemplate->subject,
            'body' => $renderedBody,
            'sender_name' => $this->message->sender_name ?? 'FirstContact',
        ])->render();
    }

    protected function prepareTemplateData(string $recipientName): array
    {
        $template = $this->message->template;
        $viewPath = $template?->view_path ?? 'templates.default';

        return match ($viewPath) {
            'emails.templates.event' => [
                'recipient_name' => $recipientName,
                'event_title' => $template?->name ?? 'Event Reminder',
                'event_date' => now()->addDays(15)->format('Y-m-d'),
                'event_location' => 'TBD',
            ],
            'emails.templates.invoice' => [
                'invoice_number' => 'INV-' . str_pad($this->message->id, 3, '0', STR_PAD_LEFT),
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
                'announcement_body' => 'This is a general announcement message.',
            ],
            'emails.templates.offer' => [
                'recipient_name' => $recipientName,
                'offer_details' => 'Special offer for you!',
                'expiry_date' => now()->addDays(7)->format('Y-m-d'),
            ],
            default => [
                'recipient_name' => $recipientName,
                'message_content' => Blade::render($this->message->messageTemplate->body, [
                    'recipient_name' => $recipientName,
                ]),
            ],
        };
    }
}
