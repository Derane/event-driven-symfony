<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class WebhooksControllerTest extends WebTestCase
{
    protected function setUp(): void
    {
        $this->client = static::createClient();
    }

    public function testWebhooksAreHandled()
    {
        $incomingWebhookPayload = '{"event":"newsletter_subscribed","id":"12345","origin":"www","timestamp":"2024-12-12T12:00:00Z","user": {"client_id":"4a2b342d-6235-46a9-bc95-6e889b8e5de1","email":"email@example.com","region":"EU"},"newsletter": {"newsletter_id":"newsletter-001","topic":"N/A","product_id":"TechGadget-3000X"}}';
    }
}
