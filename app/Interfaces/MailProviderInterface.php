<?php

namespace App\Interfaces;

interface MailProviderInterface
{
    public function sendEmail($to, $subject, $body, $from = null);
    public function getProviderName();
}
