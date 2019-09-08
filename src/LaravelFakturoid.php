<?php

namespace WEBIZ\LaravelFakturoid;

use Fakturoid;

class LaravelFakturoid {

	public function __construct() {
		$this->config = [
			'app_name' => config('fakturoid.app_name'),
			'app_email' => config('fakturoid.app_email'),
			'app_api_key' => config('fakturoid.app_api_key'),
			'app_contact' => config('fakturoid.app_contact'),
		];
		$this->initFakturoid();
	}

	protected function initFakturoid() {
		$this->fakturoid = new Fakturoid\Client($this->config['app_name'], $this->config['app_email'], $this->config['app_api_key'], $this->config['app_contact']);

		return $this->fakturoid;
	}

	public function gooo() {
		dd($this);
	}

}
