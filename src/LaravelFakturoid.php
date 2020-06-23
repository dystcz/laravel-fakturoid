<?php

namespace WEBIZ\LaravelFakturoid;

use Fakturoid;

class LaravelFakturoid
{
    public function __construct()
    {
        $this->config = [
            'account_name' => config('fakturoid.account_name'),
            'account_email' => config('fakturoid.account_email'),
            'account_api_key' => config('fakturoid.account_api_key'),
            'app_contact' => config('fakturoid.app_contact'),
        ];
        $this->initFakturoid();
    }

    protected function initFakturoid()
    {
        $this->fakturoid = new Fakturoid\Client($this->config['account_name'], $this->config['account_email'], $this->config['account_api_key'], $this->config['app_contact']);

        return $this->fakturoid;
    }

    public function __call($name, $arguments)
    {
        if (method_exists($this, $name)) {
            return $this->{$name}(...$arguments);
        }

        if (method_exists($this->fakturoid, $name)) {
            $fakturoid = $this->fakturoid;
            $methodResult = $fakturoid->{$name}(...$arguments);
            return $methodResult;
        }

        return null;
    }
}
