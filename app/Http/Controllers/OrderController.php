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
use Meta;

class OrderController extends Controller {

    public function index(Request $r) {
        $this->meta();
        session_start();
        if (isset($_SESSION['view'])) {
            $promotion = $_SESSION['view'];
        }

        $cartCollection = Cart::getContent();
        $products = $cartCollection->toArray();
        if (isset(\Auth::user()->name)) {
            $authUser = \Auth::user()->name;
        } else {
            $authUser = null;
        }

        return view('order.index', compact('products', 'authUser','promotion'));
    }

    public function store($slug) {
        $product = Product::where('slug', $slug)->first();
        $category = Category::where('id', $product->categories_id)->first();
        
        
        
        

        Cart::add(array(
            'id' => $product->id,
            'name' => $product->title,
            'price' => $product->price,
            'quantity' => 1,
            'attributes' => array($product->image_url)
        ));

        return redirect(LaravelLocalization::setLocale() . DIRECTORY_SEPARATOR . "category/$category->slug")->with('message', 'Продукта е добавен в количката!');
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
        if (LaravelLocalization::setLocale() == "bg") {
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
        } elseif (LaravelLocalization::setLocale() == "el") {
            $messages = [
                'telephone.required' => 'Το τηλέφωνο πεδίο είναι υποχρεωτικό!',
                'telephone.size' => 'Η συσκευή πεδίου θα πρέπει να είναι μεγαλύτερη από 4 ψηφία!',
                'name.required' => 'Το όνομα του πεδίου είναι υποχρεωτική!',
                'name.size' => 'Όνομα τομέα είναι πολύ μεγάλη!',
                'email.required' => 'Το email πεδίο είναι υποχρεωτικό!',
                'email.email' => 'Μη έγκυρη μορφή E-mail!',
                'adress.required' => 'Το πεδίο είναι προαιρετικό διεύθυνση!',
                'adress.size' => 'Δικαίωμα διεύθυνση πρέπει να είναι περισσότερο από 4 χαρακτήρες!',
                'town.required' => 'Το πεδίο είναι προαιρετικό πόλη!',
                'town.size' => 'Πόλη πεδίου θα πρέπει να είναι μεγαλύτερη από 2 χαρακτήρες!',
            ];
        } else {
            $messages = [
                'telephone.required' => 'Telefonul camp este obligatoriu!',
                'telephone.size' => 'Dispozitivul de câmp trebuie să fie mai mare de 4 cifre!',
                'name.required' => 'Полето име е задължително!',
                'name.size' => 'Numele câmpului este obligatoriu!',
                'email.required' => 'E-mailul camp este obligatoriu!',
                'email.email' => 'Format de e-mail nevalidă!',
                'adress.required' => 'Câmpul este adresa opțională!',
                'adress.size' => 'Adresa de dreapta trebuie să fie mai mult de 4 caractere!',
                'town.required' => 'Câmpul este opțional oraș!',
                'town.size' => 'Oraș câmp trebuie să fie mai mare de 2 caractere!',
            ];
        }
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
        if (!isset(\Auth::user()->name)) {
            if ($validator->fails()) {
                return redirect(LaravelLocalization::setLocale() . '/order/save')
                                ->withErrors($validator)
                                ->withInput();
            }
        }
        $input = $request->all();

        $cartCollection = Cart::getContent();
        $products = $cartCollection->toArray();

        $productId = array_keys($products);
        
         session_start();
          if (isset($_SESSION['view'])) {
              
             $discount=$_SESSION['view'];
          }else{
             $discount=0;
          }
     

        if (isset(\Auth::user()->name)) {
            $authUser = \Auth::user();
            $orderSave = Order::create([
                        'telephone' => $authUser->telephone,
                        'user_name' => $authUser->name,
                        'email' => $authUser->email,
                        'adress' => $authUser->adress,
                        'town' => $authUser->town,
                        'comment' => $input['comment'],
                        'promo'=>$discount,
            ]);
        } else {

            $orderSave = Order::create([
                        'telephone' => $input['telephone'],
                        'user_name' => $input['name'],
                        'email' => $input['email'],
                        'adress' => $input['adress'],
                        'town' => $input['town'],
                        'comment' => $input['comment'],
                        'promo'=>$discount,
            ]);
        }



        $order = Order::find($orderSave->id);
        
        $order->product()->attach($productId);
        foreach ($productId as $rm) {
            Cart::remove($rm);
        }
        return redirect(LaravelLocalization::setLocale() . DIRECTORY_SEPARATOR . "success");
        //return redirect(LaravelLocalization::setLocale() . "/")->with('msg', 'Направихте успешна поръчка. Ще се свържем скоро.');
    }

    private function meta() {
        Meta::meta('title', 'За поръчка');
    }

    public function fastOrder(Request $request) {
        $input = $request->all();
        $validator = $this->validator($request->all());
        $product = Product::where('id', $input['product']);
        $getProd = $product->first()->toArray();
      

        if ($validator->fails()) {
            return redirect(LaravelLocalization::setLocale() . '/product/' . $getProd['slug'])
                            ->withErrors($validator)
                            ->with('status', 'Error')
                            ->withInput();
        }
        session_start();
          if (isset($_SESSION['view'])) {
              
             $discount=$_SESSION['view'];
          }else{
             $discount=0;
          }
          
        $orderSave = Order::create([
                    'telephone' => $input['telephone'],
                    'user_name' => $input['name'],
                    'email' => $input['email'],
                    'adress' => $input['adress'],
                    'town' => $input['town'],
                    'comment' => $input['comment'],
                    'promo'=> $discount
        ]);
       

        $order = Order::find($orderSave->id);

        $order->product()->attach($input['product']);


       
        if (isset($_SESSION['view'])) {
            $_SESSION['view'] = $_SESSION['view'] + 1;
        } else {
            $_SESSION['view'] = 1;
        }
        

        return redirect(LaravelLocalization::setLocale() . DIRECTORY_SEPARATOR . "success");
    }

    public function productOrder(Request $request) {
        $input = $request->all();
        $validator = $this->validator($request->all());
        $product = Product::where('id', $input['product']);
        $getProd = $product->first()->toArray();

        if ($validator->fails()) {
            return redirect(LaravelLocalization::setLocale() . '/product/' . $getProd['slug'])
                            ->withErrors($validator)
                            ->with('status', 'Error')
                            ->withInput();
        }

        $orderSave = Order::create([
                    'telephone' => $input['telephone'],
                    'user_name' => $input['name'],
                    'email' => $input['email'],
                    'adress' => $input['adress'],
                    'town' => $input['town'],
                    'comment' => $input['comment'],
        ]);

        $order = Order::find($orderSave->id);

        $order->product()->attach($input['product']);

        // return redirect(LaravelLocalization::setLocale() . DIRECTORY_SEPARATOR . "success");
        return redirect(LaravelLocalization::setLocale() . '/product/' . $getProd['slug'])->with('msg', 'ok');
    }

    public function success() {
        return view('order.success');
    }

}
