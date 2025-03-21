<?php

namespace App\Webhook\Handler;

use App\DTO\Webhook;

interface WebhookHandlerInterface
{
    public function supports(Webhook $webhook): bool;

    public function handle(Webhook $webhook): void;
}