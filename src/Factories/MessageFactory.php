<?php

namespace Grechanyuk\SmsDiscount\Factories;

use Grechanyuk\SmsDiscount\Builders\MessageBuilder;

abstract class MessageFactory {
    protected function getMessages($messages):array {
        $return = [];
        if(is_array($messages)) {
            foreach ($messages as $message) {
                if ($message instanceof MessageBuilder) {
                    $return[] = $message;
                }
            }
        } else if($messages instanceof MessageBuilder) {
            $return[] = $messages;
        }

        return $return;
    }
}