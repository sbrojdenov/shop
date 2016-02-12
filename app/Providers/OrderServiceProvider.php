<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Cart;

class OrderServiceProvider extends ServiceProvider {

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        view()->composer('layouts.app', function($view) {
            $cartCollection = Cart::getContent();
            $_order=$cartCollection->count();
            $view->with('_order', $_order);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        
    }

}
