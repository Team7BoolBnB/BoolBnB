<?php

namespace App\Providers;

use Braintree\Gateway;
use Illuminate\Support\Facades\Gate;
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
        //Per fare questo abbiamo modificato file in .env e creato il nostro file di configurazione in services
        $this->app->singleton(Gateway::class, function($app){

            return  new Gateway(config("services.braintree"));
                
        });

        // Questo è quello che accade nella nostra funzione boot() realmente

        /* $this->app->singleton(Gateway::class, function($app){[
            "environment"=>"sandbox",
            "merchantId"=>"dyn5nhmxpbz5jpbh",
            "publicKey"=>"rt28b7wm9f58qf5d",
            "privateKey"=>"bf5b0be902801c74d44d2067bd54de8c",

        ]}); */

        // noi però ottimizziamo tutto il servizio 
        // spostando tutto su delle variabili di sistema, quindi nel .env e chiamandole in config
        // quindi questa parte prima di mergiare in main andrebbe rimossa e tenuta solo quella sopra


    }
}
