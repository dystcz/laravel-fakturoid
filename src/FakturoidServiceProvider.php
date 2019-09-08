<?php

namespace WEBIZ\LaravelFakturoid;

use Illuminate\Support\ServiceProvider;
use WEBIZ\LaravelFakturoid\LaravelFakturoid;

class FakturoidServiceProvider extends ServiceProvider {
	/**
	 * Bootstrap services.
	 *
	 * @return void
	 */
	public function boot() {
		$this->publishes([
			__DIR__ . '/config.php' => config_path('fakturoid.php'),
		]);
	}

	/**
	 * Register services.
	 *
	 * @return void
	 */
	public function register() {
		if (is_dir($vendor = __DIR__ . '/../vendor')) {
			require_once $vendor . '/autoload.php';
		}
		$this->app->singleton('Fakturoid', function ($app) {
			return new LaravelFakturoid();
		});
	}
}
