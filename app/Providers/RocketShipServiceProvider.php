<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Forms\Contracts\RocketShipContract;

use App\Forms\RocketShip;

use guzzleHttp\Client;

class RocketShipServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //


    }

    /**
     * Register the application services.
     *
     * @return void
     */
     public function register()
     {
         $this->app->bind('RoketLuncher', function(){

             return new RocketShip();

         });

         $this->app->singleton('guzzle', function($app){
            $client = new \Guzzle\Service\Client();
            
            return $client;
        
          });

         $this->app->bind('GuzzleProvider', function(){

             return (new \Guzzle\Service\Client());

          });
     }

}
