<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index(){
       
        return view('category.index');
    }
    
    public function product(){
       
         return view('category.product');
    }
    
    public function order(){
         return view('category.order');
    }
    
    public function information(){
         return view('category.information');
    }
}
