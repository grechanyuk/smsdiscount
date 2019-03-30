<?php

namespace Grechanyuk\SmsDiscount;

use Grechanyuk\SmsDiscount\Builders\ConfigBuilder;
use Grechanyuk\SmsDiscount\Events\SmsDiscountSendedMessage;
use Grechanyuk\SmsDiscount\Factories\MessageFactory;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class SmsDiscount extends MessageFactory
{
    private $client;
    private $config;

    public function __construct()
    {
        $this->client = new Client(['base_uri' => 'https://api.iqsms.ru/messages/v2/']);
        $this->config = new ConfigBuilder();
    }

    public function sendSms($message, array $params = [])
    {
        $message = $this->getMessages($message);

        if ($answer = $this->postRequest('send.json', $params, ['messages' => $message])) {
            event(new SmsDiscountSendedMessage($answer->messages));
            return $answer->messages;
        }

        return false;
    }

    public function balance()
    {
        if ($answer = $this->postRequest('balance.json')) {
            return $answer->balance;
        }

        return false;
    }

    public function senders() {
        if($answer = $this->postRequest('senders.json')) {
            return $answer->senders;
        }

        return false;
    }

    private function postRequest(string $url, array $configParams = [], array $extraParams = [])
    {
        try {
            $answer = $this->client->post($url, [
                    'json' => array_merge($this->config->getConfig($configParams), $extraParams)
                ]
            );
        } catch (ClientException $e) {
            if ($e->getCode() == 401) {
                \Log::warning('Authorization fails', ['message' => $e->getMessage()]);
            }

            return false;
        }

        if ($answer->getStatusCode() == 200) {

            $answer = json_decode($answer->getBody()->getContents());
            if ($answer->status == 'ok') {
                return $answer;
            } else {
                \Log::warning('Error with sms message', ['serverResponse' => $answer]);
            }
        }

        return false;
    }
}