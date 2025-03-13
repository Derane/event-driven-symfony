<?php

namespace App\Forwarder\Newsletter\Identify;

use App\DTO\Newsletter\Newsletter;
use App\DTO\Newsletter\NewsletterWebhook;
use App\Forwarder\Newsletter\ForwarderInterface;

class SubscriptionStartForwarder implements ForwarderInterface
{
    private const string SUPPORTED_EVENT = 'newsletter_subscribed';
    public function supports(NewsletterWebhook $newsletter): bool
    {
        return $newsletter->getEvent() === self::SUPPORTED_EVENT;
    }

    public function forward(NewsletterWebhook $newsletter): void
    {
        // TODO: Implement forward() method.
    }

}