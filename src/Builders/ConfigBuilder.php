<?php

namespace Grechanyuk\SmsDiscount\Builders;

class ConfigBuilder
{
    private $defaultConfig;

    public function __construct()
    {
        $this->defaultConfig = [
            'login' => config('smsdiscount.login'),
            'password' => config('smsdiscount.password')
        ];
    }

    public function getConfig($params = [])
    {
        return array_merge($this->defaultConfig, $params);
    }
}