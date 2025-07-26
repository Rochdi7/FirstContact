<?php

namespace App\Services\MailProviders;

use App\Models\MailProvider;
use App\Services\MailProviders\GmailProvider;
use App\Services\MailProviders\OutlookProvider;
use App\Interfaces\MailProviderInterface;
use InvalidArgumentException;

class MailProviderFactory
{
    public static function create(MailProvider $mailProvider): MailProviderInterface
    {
        $settings = $mailProvider->settings;
        $provider = $mailProvider->provider;

        // Check that essential keys exist
        if (empty($settings['email']) || empty($settings['password'])) {
            throw new \InvalidArgumentException("Missing required credentials for MailProvider ID: {$mailProvider->id}");
        }

        return match ($provider) {
            'gmail'   => new GmailProvider($settings),
            'outlook' => new OutlookProvider($settings),
            default   => throw new InvalidArgumentException("Unsupported mail provider: {$provider}"),
        };
    }
}

