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
            $tags = json_decode(file_get_contents('http://getcitydetails.geobytes.com/GetCityDetails?fqcn=' . '81.12.128.0'), true);
            $mytag = (strtolower($tags['geobytesinternet']) != null ? $tags['geobytesinternet'] : 'bg');
            $_lang = (LaravelLocalization::setLocale() != null ? LaravelLocalization::setLocale() : $mytag);
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

    public function getIP() {
        foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key) {
            if (array_key_exists($key, $_SERVER) === true) {
                foreach (explode(',', $_SERVER[$key]) as $ip) {
                    if (filter_var($ip, FILTER_VALIDATE_IP) !== false) {
                        return $ip;
                    }
                }
            }
        }
    }

}
