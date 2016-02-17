<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Product;
use App\Category;
use App\Http\Controllers\Controller;
use Xinax\LaravelGettext\Facades\LaravelGettext;

class CategoryController extends Controller {

    public function index($slug) {
        LaravelGettext::setLocale('bg_BG');
        $category = Category::where('slug', $slug)->first();
        $products = Product::where('categories_id', $category->id)->get();      
        return view('category.index', compact('products', 'category'));
    }

    public function product($slug) {     
        $product = Product::where('slug', $slug)->first();
        $similar = Product::where('categories_id', $product->categories_id)->limit(4)->offset(1)->get();
        return view('category.product',compact('product','similar'));
    }

    public function order() {
        return view('category.order');
    }

    public function information() {
        return view('category.information');
    }

}
