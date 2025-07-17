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
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;

class SendMessageEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $message;

    /**
     * Create a new job instance.
     */
    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $mailProvider = MailProvider::findOrFail($this->message->mail_provider_id);
        $settings = $mailProvider->settings;
        $settings['password'] = Crypt::decrypt($settings['password']);
        $mailProvider->settings = $settings;

        $mailer = MailProviderFactory::create($mailProvider);
        $templateContent = $this->getTemplateContent();
        foreach ($this->message->recipients as $recipient) {
            $contact = $recipient->contact;
            $mailer->sendEmail(
                $contact->email,
                'Message from ' . config('app.name'),
                $templateContent
            );
        }
        Log::info('Email sent successfully for message ID: ' . $this->message->id);
    }

    /**
     * Get the template content based on the message's template_id.
     */
    protected function getTemplateContent()
    {
        $template = $this->message->template;
        if ($template && view()->exists($template->view_path)) {
            $data = $this->prepareTemplateData();
            Log::info('Rendering template ' . $template->view_path . ' with data: ', $data);
            return view($template->view_path, $data)->render();
        }
        Log::error('Template not found or view does not exist for view_path: ' . ($template->view_path ?? 'null'));
        return '<p>No template content available.</p>';
    }

    /**
     * Prepare data for the template rendering based on the template type.
     */
    protected function prepareTemplateData()
    {
        $recipient = $this->message->recipients->first()->contact ?? null;
        $template = $this->message->template;
        $viewPath = $template ? $template->view_path : '';

        return match ($viewPath) {
            'templates.event_reminder' => [
                'recipient_name' => $recipient ? $recipient->first_name . ' ' . $recipient->last_name : 'User',
                'event_title' => $template ? $template->name : 'Event Reminder',
                'event_date' => now()->addDays(15)->format('Y-m-d'),
                'event_location' => 'TBD',
            ],
            'templates.invoice' => [
                'invoice_number' => 'INV-' . str_pad($this->message->id, 3, '0', STR_PAD_LEFT),
                'invoice_date' => now()->format('Y-m-d'),
                'customer_name' => $recipient ? $recipient->first_name . ' ' . $recipient->last_name : 'Customer',
                'items' => [
                    ['name' => 'Item A', 'quantity' => 1, 'price' => 50.00],
                ],
                'subtotal' => 50.00,
                'tax' => 5.00,
                'total' => 55.00,
            ],
            'templates.hackathon_invite' => [
                'recipient_name' => $recipient ? $recipient->first_name . ' ' . $recipient->last_name : 'User',
                'event_name' => $template ? $template->name : 'Hackathon Invite',
                'event_date' => now()->addDays(30)->format('Y-m-d'),
                'event_location' => 'Online',
                'registration_link' => 'https://devaga.com/register',
            ],
            'templates.general_announcement' => [
                'recipient_name' => $recipient ? $recipient->first_name . ' ' . $recipient->last_name : 'User',
                'announcement_title' => $template ? $template->name : 'General Announcement',
                'announcement_body' => 'This is a general announcement message.',
            ],
            'templates.new_offer' => [
                'recipient_name' => $recipient ? $recipient->first_name . ' ' . $recipient->last_name : 'User',
                'offer_details' => 'Special offer for you!',
                'expiry_date' => now()->addDays(7)->format('Y-m-d'),
            ],
            default => [
                'recipient_name' => $recipient ? $recipient->first_name . ' ' . $recipient->last_name : 'User',
                'message_content' => 'Default message content.',
            ],
        };
    }
}