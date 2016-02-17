<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\Category;
use Intervention\Image\Facades\Image;
use LaravelLocalization;

class ProductsController extends Controller {

    public function products() {
        $product = Product::paginate(15);

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
                $fileThumbBig = "600x500_" . $fileName;
                $img = Image::make("$destinationPath/$fileName")->resize(400, 300);
                $img->save("$destinationPath/$fileThumb");
                $imgBig = Image::make("$destinationPath/$fileName")->resize(600, 500);
                $imgBig->save("$destinationPath/$fileThumbBig");
            }

            $product = new Product();
            $product->price = $input['price'];
            $product->code = $input['code'];
            $product->categories_id = $input['category'];
            $product->image_url = $fileName;
            $product->slug=$this->slugify($input['title']);
            $product->translateOrNew(LaravelLocalization::setLocale())->title = $input['title'];
            $product->translateOrNew(LaravelLocalization::setLocale())->summary = $input['summary'];
            $product->translateOrNew(LaravelLocalization::setLocale())->description = $input['description'];
            $product->save();

            return redirect(LaravelLocalization::setLocale() . DIRECTORY_SEPARATOR . 'admin-product');
        }
        return view('admin.products.add', compact('category'));
    }

    public function edit($id) {
        $category = Category::all();
        $product = Product::find($id);
        return view('admin.products.edit', compact('product', 'category'));
    }

    public function update($id, Request $request) {
        $product = Product::find($id);
        $image = $product->image_url;
        $input = $request->all();
        $file = (!empty($input['image_url']) ? $input['image_url'] : null);
        $product->price = $input['price'];
        $product->code = $input['code'];
        $product->categories_id = $input['category'];
        $product->translateOrNew(LaravelLocalization::setLocale())->title = $input['title'];
        $product->translateOrNew(LaravelLocalization::setLocale())->summary = $input['summary'];
        $product->translateOrNew(LaravelLocalization::setLocale())->description = $input['description'];
        if ($file != $image && !empty($file)) {
            $extension = $file->getClientOriginalExtension();
            $fileName = rand(11111, 99999) . '.' . $extension;
            $file->move("admin/product", $fileName);
            $fileThumb = "400x300_" . $fileName;
            $fileThumbBig = "600x500_" . $fileName;
            $imgBig = Image::make("admin/product/$fileName")->resize(600, 500);
            $imgBig->save("admin/product/$fileThumbBig");
            $img = Image::make("admin/product/$fileName")->resize(400, 300);
            $img->save("admin/product/$fileThumb");
            $product->image_url = $fileName;
            unlink("admin/product/" . $image);
            unlink("admin/product/400x300_" . $image);
            unlink("admin/product/600x500_" . $image);
        }
        $product->save();
        return redirect(LaravelLocalization::setLocale() . DIRECTORY_SEPARATOR . 'admin-product');
    }

    public function delete($id) {
        $product = Product::find($id);
        $product->delete();
        $image = $product->image_url;
        $product->delete();
        if (!empty($image)) {
            unlink("admin/product/400x300_" . $image);
            unlink("admin/product/600x500_" . $image);
            unlink("admin/product/" . $image);
        }
        return redirect(LaravelLocalization::setLocale() . DIRECTORY_SEPARATOR . 'admin-product')->with('status', 'Категория е изтрита!');
    }

   

}
