<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Slaider;
use App\Category;

class HomeController extends Controller
{

    public function index()
    {   
       $slaider=Slaider::all();      
       $othercat=Category::all();
       return view('home',compact('slaider','othercat'));
    }
}
