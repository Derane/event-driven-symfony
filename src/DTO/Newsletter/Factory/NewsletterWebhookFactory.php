<?php

declare(strict_types=1);

namespace App\DTO\Newsletter\Factory;

use App\DTO\Newsletter\NewsletterWebhook;
use App\DTO\Webhook;
use App\Exception\WebhookException;
use Symfony\Component\Serializer\SerializerInterface;

class NewsletterWebhookFactory
{
    public function __construct(
        private SerializerInterface $serializer,
    ) {

    }

    public function create(Webhook $webhook): NewsletterWebhook
    {

        try {
            return $this->serializer->deserialize(
                $webhook->getRawPayload(),
                NewsletterWebhook::class,
                'json'
            );
        } catch (\Exception $e) {
            throw new WebhookException('Unable to create because: ' . $e->getMessage());
        }
    }
}