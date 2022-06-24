<?php

namespace App\Providers;

use Braintree\Gateway;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->singleton(Gateway::class, function($app){
            return new Gateway (
                [
                    'environment' => 'sandbox',
                    'merchantId' => 'qd97fvd99skykywh',
                    'publicKey' => 'vsb46z4cpbgh864m',
                    'privateKey' => '73fb823081ef47555167e88d9b2b2002'
                ]);
        });
    }
}