<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// use Braintree\Braintree_Configuration;
// use App\Providers\Braintree_Configuration;

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
        // $gateway = new \Braintree\Gateway(['environment' => env('BRAINTREE_ENV')]);

        // \Braintree\Configuration::environment(env('BRAINTREE_ENV'));
        // App\Providers\Braintree_Configuration::environment(env('BRAINTREE_ENV'));
        // \Braintree_Configuration::merchantId(env('BRAINTREE_MERCHANT_ID'));
        // \Braintree_Configuration::publicKey(env('BRAINTREE_PUBLIC_KEY'));
        // \Braintree_Configuration::privateKey(env('BRAINTREE_PRIVATE_KEY'));
    }
}
