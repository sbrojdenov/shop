<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Slaider;
use App\Category;
use Meta;

class HomeController extends Controller
{

    public function index()
    {   
       $this->meta();
       $slaider=Slaider::all();      
       $othercat=Category::where('main_category', 2)->orWhere('main_category', 3)->get(); 
       return view('home',compact('slaider','othercat'));
    }
    
    private function meta(){
        Meta::meta('title', 'Начало');
    }
}
