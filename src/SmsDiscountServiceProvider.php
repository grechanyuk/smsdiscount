<?php

namespace Grechanyuk\SmsDiscount;

use Illuminate\Support\ServiceProvider;

class SmsDiscountServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'grechanyuk');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'grechanyuk');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/smsdiscount.php', 'smsdiscount');

        // Register the service the package provides.
        $this->app->singleton('smsdiscount', function ($app) {
            return new SmsDiscount;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['smsdiscount'];
    }
    
    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/smsdiscount.php' => config_path('smsdiscount.php'),
        ], 'smsdiscount.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/grechanyuk'),
        ], 'SmsDiscount.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/grechanyuk'),
        ], 'SmsDiscount.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/grechanyuk'),
        ], 'SmsDiscount.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}
