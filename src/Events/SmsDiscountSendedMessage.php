<?php

namespace Grechanyuk\SmsDiscount\Events;

use Illuminate\Queue\SerializesModels;

class SmsDiscountSendedMessage {
    use SerializesModels;

    public $messages;

    public function __construct($messages)
    {
        $this->messages = $messages;
    }
}