<?php

namespace App\Services\MailProviders;

use App\Interfaces\MailProviderInterface;
use Illuminate\Support\Facades\Mail;


class GmailProvider implements MailProviderInterface
{
    protected array $config;

    public function __construct(array $settings)
    {
        $this->config = [
            'transport' => 'smtp',
            'host' => 'smtp.gmail.com',
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
        config(['mail.mailers.gmail' => $this->config]);
        config(['mail.default' => 'gmail']);

        Mail::mailer('gmail')->send([], [], function ($message) use ($to, $subject, $body, $from) {
            $message->to($to)->subject($subject)->html($body);
            if ($from) {
                $message->from($from);
            }
        });

        return ['status' => 'sent'];
    }

    public function getProviderName(): string
    {
        return 'gmail';
    }
}
