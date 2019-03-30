<?php

namespace Grechanyuk\SmsDiscount;

use Grechanyuk\SmsDiscount\Entities\Client;
use Grechanyuk\SmsDiscount\Builders\MessageBuilder;
use Grechanyuk\SmsDiscount\Interfaces\SmsDiscountClientInterface;

class MessageDiscount
{
    public function createMessage($client, string $message, string $sender = null, $flash = 0): MessageBuilder
    {
        if (!$client instanceof SmsDiscountClientInterface) {
            $client = new Client($client['phone'], $client['clientId']);
        }

        return new MessageBuilder($client, $message, $sender, $flash);
    }
}
