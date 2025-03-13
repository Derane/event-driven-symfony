<?php

namespace App\Webhook\Handler;

use App\DTO\Newsletter\Factory\NewsletterWebhookFactory;
use App\DTO\Newsletter\Newsletter;
use App\DTO\Webhook;

class NewsletterHandler implements WebhookHandlerInterface
{
    private const array SUPPORTED_TYPES = [
        'newsletter_opened',
        'newsletter_subscribed',
        'newsletter_unsubscribed',
    ];

    public function __construct(
        private NewsletterWebhookFactory $factory,
    )
    {
    }

    public function supports(Webhook $webhook): bool
    {
        return in_array($webhook->getEvent(), self::SUPPORTED_TYPES);
    }

    public function handle(Webhook $webhook): void
    {
        $webhook = $this->factory->create($webhook);
        dd($webhook);
    }
}
