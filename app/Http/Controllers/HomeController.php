<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Slaider;
use App\Product;
use Meta;

class HomeController extends Controller {

    public function index() {   //$_SERVER['REMOTE_ADDR']
       
        //BG RO GR

        $tags=json_decode(file_get_contents('http://getcitydetails.geobytes.com/GetCityDetails?fqcn='. '81.12.128.0'), true);
        //dd($tags['geobytesinternet']);
        
        $this->meta();
        $slaider = Slaider::all();
        $checke_product = Product::where('checked', 1)->get();
        return view('home', compact('slaider', 'checke_product'));
    }

    private function meta() {
        Meta::meta('title', 'Начало');
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
