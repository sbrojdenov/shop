<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use App\Category;

class CartServiceProvider extends ServiceProvider {

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        $this->app['wishlist'] = $this->app->share(function($app) {
            $storage = $app['session']; // laravel session storage
            $events = $app['events']; // laravel event handler
            $instanceName = 'wishlist'; // your cart instance name
            $session_key = 'AsASDMCks0ks1'; // your unique session key to hold cart items

            return new Cart(
                    $storage, $events, $instanceName, $session_key
            );
        });
    }

}
