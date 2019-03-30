<?php

namespace Grechanyuk\SmsDiscount\Builders;

use Grechanyuk\SmsDiscount\Interfaces\SmsDiscountClientInterface;

class MessageBuilder implements \JsonSerializable
{
    private $phone;
    private $sender;
    private $clientId;
    private $text;
    private $flash;

    public function __construct(SmsDiscountClientInterface $client, string $message, string $sender = null, $flash = 0)
    {
        $this->sender = $sender;
        if (!$sender) {
            $this->sender = config('smsdiscount.sender') ?: '';
        }

        $this->phone = $this->formatTelephone($client->smsDiscountGetTelephone());
        $this->clientId = (string)$client->smsDiscountGetClientId();
        $this->text = $message;
        $this->flash = $flash;
    }

    /**
     * Specify data which should be serialized to JSON.
     *
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     *
     * @return mixed data which can be serialized by <b>json_encode</b>,
     *               which is a value of any type other than a resource.
     *
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    private function formatTelephone(string $telephone)
    {
        return preg_replace('/[^0-9]/', '', $telephone);
    }
}