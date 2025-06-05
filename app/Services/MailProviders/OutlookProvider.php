<?php

namespace App\Services\MailProviders;

use App\Interfaces\MailProviderInterface;
use Illuminate\Support\Facades\Mail;

class OutlookProvider implements MailProviderInterface
{
    protected array $config;

    public function __construct(array $settings)
    {
        $this->config = [
            'transport' => 'smtp',
            'host' => 'smtp.office365.com',
            'port' => 587,
            'encryption' => 'tls',
            'username' => $settings['email'],
            'password' => $settings['password'],
            'timeout' => null,
            'auth_mode' => null,
        ];
    }

    public function sendEmail($to, $subject, $body, $from = null)
    {
        config(['mail.mailers.outlook' => $this->config]);
        config(['mail.default' => 'outlook']);

        Mail::mailer('outlook')->send([], [], function ($message) use ($to, $subject, $body, $from) {
            $message->to($to)->subject($subject)->html($body);
            if ($from) {
                $message->from($from);
            }
        });

        return ['status' => 'sent'];
    }

    public function getProviderName(): string
    {
        return 'outlook';
    }
}
