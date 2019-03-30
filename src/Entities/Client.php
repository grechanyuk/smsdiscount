<?php

namespace Grechanyuk\SmsDiscount\Entities;

use Grechanyuk\SmsDiscount\Interfaces\SmsDiscountClientInterface;

class Client implements SmsDiscountClientInterface {

    private $phone;
    private $clientId;

    public function __construct(string $phone, int $clientId)
    {
        $this->phone = $phone;
        $this->clientId = $clientId;
    }

    public function smsDiscountGetTelephone()
    {
        return $this->phone;
    }

    public function smsDiscountGetClientId()
    {
        return $this->clientId;
    }
}