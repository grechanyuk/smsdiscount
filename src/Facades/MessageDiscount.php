<?php

namespace Grechanyuk\SmsDiscount\Facades;

use Grechanyuk\SmsDiscount\Interfaces\SmsDiscountClientInterface;
use Illuminate\Support\Facades\Facade;

/**
 * @method static createMessage(SmsDiscountClientInterface|array $client, string $message, string $sender = null)
 */
class MessageDiscount extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'messagediscount';
    }
}
