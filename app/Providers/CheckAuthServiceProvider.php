<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CheckAuthServiceProvider extends ServiceProvider {

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        view()->composer('layouts.app', function($view) {
            if(isset(\Auth::user()->name)){
            $auth = \Auth::user()->name;
            }else{
                $auth=null;
            }
            $view->with('_auth', $auth);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
    }

}
