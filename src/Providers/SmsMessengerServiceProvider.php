<?php

namespace Anker\SmsMessenger\Providers;

use Anker\SmsMessenger\DummyMessenger;
use Anker\SmsMessenger\PsWinComMessenger;
use Anker\SmsMessenger\SmsMessenger;
use Anker\SmsMessenger\TelenorMessenger;
use Illuminate\Support\ServiceProvider;

class SmsMessengerServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'sms');

        if (! $this->app->routesAreCached()) {
            require __DIR__.'/../Http/routes.php';
        }

        $this->publishes([
            __DIR__.'/../../config/sms.php' => config_path('sms.php'),
        ]);
    }
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //$provider = config('sms.default-provider');
        //var_dump($provider);
        
        $this->app->singleton(SmsMessenger::class, function () {
            if (config('sms.default-provider') == 'pswincom') {
                return new PsWinComMessenger();
            }

            if (config('sms.default-provider') == 'telenor') {
                return new TelenorMessenger();
            }
            
            else {
                return new DummyMessenger();
            }
        });
    }

}