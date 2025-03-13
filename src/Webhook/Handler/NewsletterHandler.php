<?php

namespace App\Webhook\Handler;

use App\DTO\Newsletter\Factory\NewsletterWebhookFactory;
use App\DTO\Newsletter\Newsletter;
use App\DTO\Newsletter\NewsletterWebhook;
use App\DTO\Webhook;
use App\Forwarder\Newsletter\ForwarderInterface;
use Symfony\Component\DependencyInjection\Attribute\AutowireIterator;

class NewsletterHandler implements WebhookHandlerInterface
{
    private const array SUPPORTED_TYPES = [
        'newsletter_opened',
        'newsletter_subscribed',
        'newsletter_unsubscribed',
    ];

    /**
     * @param iterable<ForwarderInterface> $forwarders
     */
    public function __construct(
        private NewsletterWebhookFactory $factory,
        #[AutowireIterator('forwarder.newsletter')] private iterable $forwarders,
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
        foreach ($this->forwarders as $forwarder) {
            if($forwarder->supports($webhook)) {
                $forwarder->handle($webhook);
            }
        }
    }
}
