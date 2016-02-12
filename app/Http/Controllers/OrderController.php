<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Product;
use App\Category;
use App\Http\Controllers\Controller;
use Cart;
use LaravelLocalization;



class OrderController extends Controller {

    public function index(Request $r) {
        
        $cartCollection = Cart::getContent();
        $products=$cartCollection->toArray();
     
        
        return view('order.index',compact('products'));
    }

    public function store($slug) {
        $product = Product::where('slug', $slug)->first();

        Cart::add(array(
            'id' => $product->id,
            'name' => $product->title,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => array($product->image_url)
        ));
        
     return redirect(LaravelLocalization::setLocale().DIRECTORY_SEPARATOR."category/$product->slug")->with('message', 'Продукта е добавен в количката!');
       
    }
    
     public function detail($slug) {
        $product = Product::where('slug', $slug)->first();     
        Cart::add(array(
            'id' => $product->id,
            'name' => $product->title,
            'price' => $product->price,
            'quantity' => $product->image_url,
            'attributes' => array(),
            
        ));
        
     return redirect(LaravelLocalization::setLocale().DIRECTORY_SEPARATOR."product/$product->slug")->with('msg', 'Продукта е добавен в количката!');
       
    }
    
    public function delete($id){
       Cart::remove($id); 
       return redirect(LaravelLocalization::setLocale().DIRECTORY_SEPARATOR."order");
    }
    
   
}
