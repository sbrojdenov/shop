<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Product;
use App\Category;
use App\Http\Controllers\Controller;
use Cart;
use LaravelLocalization;
use Validator;
use App\Order;

class OrderController extends Controller {

    public function index(Request $r) {

        $cartCollection = Cart::getContent();
        $products = $cartCollection->toArray();


        return view('order.index', compact('products'));
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

        return redirect(LaravelLocalization::setLocale() . DIRECTORY_SEPARATOR . "category/$product->slug")->with('message', 'Продукта е добавен в количката!');
    }

    public function detail($slug) {
        $product = Product::where('slug', $slug)->first();
        Cart::add(array(
            'id' => $product->id,
            'name' => $product->title,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => array('code' => $product->code),
        ));

        return redirect(LaravelLocalization::setLocale() . DIRECTORY_SEPARATOR . "product/$product->slug")->with('msg', 'Продукта е добавен в количката!');
    }

    public function delete($id) {
        Cart::remove($id);
        return redirect(LaravelLocalization::setLocale() . DIRECTORY_SEPARATOR . "order");
    }

    protected function validator(array $data) {
        $messages = [
            'telephone.required' => 'Полето телефон е задължително!',
            'telephone.size' => 'Полето телефон трябва да бъде по-голямо от 4 цифри!',
            'name.required' => 'Полето име е задължително!',
            'name.size' => 'Полето име е твъдре голямо!',
            'email.required' => 'Полето имейл е задължително!',
            'email.email' => 'Невалиден имейл формат!',
            'adress.required' => 'Полето адрес е задължително!',
            'adress.size' => 'Полето адрес трябва да е по-голямо от 4 символа!',
            'town.required' => 'Полето град е задължително!',
            'town.size' => 'Полето град трябва да е по-голямо от 2 символа!',
        ];
        return Validator::make($data, [
                    'telephone' => 'required|min:4|max:50',
                    'name' => 'required|max:100',
                    'email' => 'required|email|max:255',
                    'adress' => 'required|min:5|max:255',
                    'town' => 'required|min:3|max:100',
                        ], $messages);
    }

    public function makeOrder(Request $request) {

        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            return redirect('order/save')
                            ->withErrors($validator)
                            ->withInput();
        }
        $input = $request->all();

        $cartCollection = Cart::getContent();
        $products = $cartCollection->toArray();
        
        $productId=array_keys($products);
       
        

        $orderSave=Order::create([
            'telephone' => $input['telephone'],
            'user_name' => $input['name'],
            'email' => $input['email'],
            'adress' => $input['adress'],
            'town' => $input['town'],
            'comment' => $input['comment'],       
        ]);
        
       $order=Order::find($orderSave->id);

       $order->product()->attach($productId);
        foreach ($productId as $rm){
            Cart::remove($rm);
        }
       
        return redirect(LaravelLocalization::setLocale(). "/")->with('msg', 'Направихте успешна поръчка. Ще се свържем скоро.');
    }
    
   
}
