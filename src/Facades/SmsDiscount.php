<?php

namespace Grechanyuk\SmsDiscount\Facades;

use Grechanyuk\SmsDiscount\Builders\MessageBuilder;
use Illuminate\Support\Facades\Facade;

/**
 * @method static sendSms(MessageBuilder|array $message)
 * @method static balance()
 * @method static senders()
 */
class SmsDiscount extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'smsdiscount';
    }
}
