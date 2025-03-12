<?php

namespace App\Webhook\Handler;

use App\DTO\Webhook;

class NewsletterHandler implements WebhookHandlerInterface
{
    private const array SUPPORTED_TYPES = [
        'newsletter_opened',
        'newsletter_subscribed',
        'newsletter_unsubscribed',
    ];
    public function supports(Webhook $webhook): bool
    {
        return in_array($webhook->getEvent(), self::SUPPORTED_TYPES);
    }

    public function handle(Webhook $webhook): void
    {
        // TODO: Implement handle() method.
    }
}
