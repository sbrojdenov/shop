<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Product;
use App\Category;
use App\Http\Controllers\Controller;
use Meta;

class CategoryController extends Controller {

    public function index($slug) {
        $this->meta();
        $category = Category::where('slug', $slug)->first();
        session_start();
        if (isset($_SESSION['view'])) {
            $promotion = $_SESSION['view'];
        }

        $products = Product::where('categories_id', $category->id)->get();
        return view('category.index', compact('products', 'category', 'promotion'));
    }

    public function product($slug) {
        session_start();
        if (isset($_SESSION['view'])) {
            $promotion = $_SESSION['view'];
        }
        $product = Product::where('slug', $slug)->first();
        $imagepivot=$product->image_product()->where('product_id', $product->id)->get()->toArray();
        
        $this->metaProduct($product->title, $product->summary);
        $similar = Product::where('categories_id', $product->categories_id)->limit(4)->offset(1)->get();
        return view('category.product', compact('product', 'similar','promotion','imagepivot'));
    }

    public function order() {
        $this->meta();
        return view('category.order');
    }

    public function information() {
        $this->meta();
        return view('category.information');
    }

    private function meta() {
        Meta::meta('title', 'Категория');
    }

    private function metaProduct($title, $des) {
        Meta::meta('title', $title);
        Meta::meta('title', $des);
    }

}
