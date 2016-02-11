<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use LaravelLocalization;
class LanguageServiceProvider extends ServiceProvider {

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot() {

         view()->composer('*', function($view) {
            $_lang = (LaravelLocalization::setLocale() != null ? LaravelLocalization::setLocale() : 'bg');
            $view->with('_lang', $_lang);
        });
       
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register() {
        //
    }

}
