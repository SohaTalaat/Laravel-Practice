<?php

namespace App\Services;

use App\Contracts\Notifier;

class SmsNotifier implements Notifier
{
    public function send(string $message): void
    {
        logger("SMS" . $message);
    }
}
