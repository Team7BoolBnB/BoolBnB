<?php

namespace App\Providers;

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
        //Per fare questo abbiamo modificato file in .env e creato il ostro file di configurazione
        $this->app->singleton(Gateway::class, function($app){
            return new Braintree\Configuration(config("services.braintree"));
        });


        // Questo è quello che accade nella nostra funzione boot() realmente

        /* $this->app->singleton([
            "environment"=>"sandbox",
            "merchantId"=>"dyn5nhmxpbz5jpbh",
            "publicKey"=>"rt28b7wm9f58qf5d",
            "privateKey"=>"bf5b0be902801c74d44d2067bd54de8c",

        ]); */

        // noi però ottimizziamo e erendiamo il servizio(ance se fake)
        // spostanto tutto su delle variabili di sistema, quindi nel .env e chiamando il config
        // quindi questa parte prima di mergiare in main andrebbe rimossa e tenuta solo quella sopra


    }
}
