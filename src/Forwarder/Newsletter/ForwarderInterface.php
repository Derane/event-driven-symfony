<?php

namespace App\Forwarder\Newsletter;

use App\DTO\Newsletter\Newsletter;
use App\DTO\Newsletter\NewsletterWebhook;

interface ForwarderInterface
{

    public function supports(NewsletterWebhook $newsletter): bool;

    public function forward(NewsletterWebhook $newsletter): void;
}