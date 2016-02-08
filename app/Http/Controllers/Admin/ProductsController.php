<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use Intervention\Image\Facades\Image;
use LaravelLocalization;

class ProductsController extends Controller {

    public function products() {
        $product = Product::all();

        return view('admin.products.index', compact('product'));
    }

    public function add(Request $request) {
        $category = Category::all();
        if ($request->isMethod('post')) {
            $input = $request->all();
            $fileName = null;
            if (!empty($input['image_url'])) {
                $file = $input['image_url'];
                $extension = $file->getClientOriginalExtension();
                $fileName = rand(11111, 99999) . '.' . $extension;
                $file->move("admin/product", $fileName);
                $destinationPath = "admin/product";
                $fileThumb = "400x300_" . $fileName;
                $img = Image::make("$destinationPath/$fileName")->resize(400, 300);
                $img->save("$destinationPath/$fileThumb");
            }
            
           $product= new Product();
           $product->price=$input['price'];
           $product->code=$input['code'];
           $product->categories_id=$input['category'];
           $product->image_url=$fileName;
           $product->translateOrNew(LaravelLocalization::setLocale())->title =$input['title'];
           $product->translateOrNew(LaravelLocalization::setLocale())->summary =$input['summary'];
           $product->translateOrNew(LaravelLocalization::setLocale())->description =$input['description'];
           $product->save();

            return redirect(LaravelLocalization::setLocale().DIRECTORY_SEPARATOR.'admin-product');
        }
        return view('admin.products.add', compact('category'));
    }
    
     public function edit($id) {
       $category = Category::all();
        $product = Product::find($id);
         return view('admin.products.edit', compact('product','category'));
    }
    
    
    public function delete($id) {
        $product = Product::find($id);
        $product->delete();
        $image = $product->image_url;
        $product->delete();
        if (!empty($image)) {
            unlink("admin/product/400x300_" . $image);
            unlink("admin/product/" . $image);
        }
        return redirect('admin-product')->with('status', 'Категория е изтрита!');
    }

}
