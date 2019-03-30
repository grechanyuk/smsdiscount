<?php

namespace Grechanyuk\SmsDiscount\Interfaces;

interface SmsDiscountClientInterface {
    public function smsDiscountGetTelephone();
    public function smsDiscountGetClientId();
}