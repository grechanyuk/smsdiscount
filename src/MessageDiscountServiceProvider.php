<?php

namespace Grechanyuk\SmsDiscount;

use Illuminate\Support\ServiceProvider;

class MessageDiscountServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {

    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        // Register the service the package provides.
        $this->app->singleton('messagediscount', function ($app) {
            return new MessageDiscount;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['messagediscount'];
    }
}
