<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use App\Category;
use LaravelLocalization;

class AppServiceProvider extends ServiceProvider {

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        view()->composer('layouts.app', function($view) {
            $category = Category::where('main_category', 1)->orWhere('main_category', 3)->get();        
            $view->with('category', $category);
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
