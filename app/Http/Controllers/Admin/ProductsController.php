<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;
use App\MyImage;
use App\Category;
use Intervention\Image\Facades\Image;
use LaravelLocalization;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller {

    public function products() {
        $product = Product::paginate(15);

        return view('admin.products.index', compact('product'));
    }

    public function add(Request $request) {
        $category = Category::all();
        if ($request->isMethod('post')) {
            $input = $request->all();
            $myimages = $input['upload'];

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
            $product->code = $input['code'];
            $product->checked = $input['checked'];
            $product->categories_id = $input['category'];
            $product->image_url = $fileName;
            $product->slug = $this->slugify($input['title']);
            $product->translateOrNew(LaravelLocalization::setLocale())->title = $input['title'];
            $product->translateOrNew(LaravelLocalization::setLocale())->summary = $input['summary'];
            $product->translateOrNew(LaravelLocalization::setLocale())->description = $input['description'];
            $product->translateOrNew(LaravelLocalization::setLocale())->price = $input['price'];
            $product->save();
            foreach ($myimages as $image) {

                $ext = $image->getClientOriginalExtension();
                $fileNameMulty = rand(11111, 99999) . '.' . $ext;
                $image->move("admin/product", $fileNameMulty);
                $destinationPath = "admin/product";
                $fileThumbBigMulty = "600x500_" . $fileNameMulty;
                $imgBig = Image::make("$destinationPath/$fileNameMulty")->resize(600, 500);
                $imgBig->save("$destinationPath/$fileThumbBigMulty");
                $imageModel = new MyImage;
                $imageModel->image = $fileNameMulty;
                $imageModel->save();
                $product->image_product()->attach($imageModel->id);
            }

            return redirect(LaravelLocalization::setLocale() . DIRECTORY_SEPARATOR . 'admin-product');
        }
        return view('admin.products.add', compact('category'));
    }

    public function edit($id) {
        $category = Category::all();
        $product = Product::find($id);
        $imagepivot = $product->image_product()->where('product_id', $id)->get()->toArray();
        return view('admin.products.edit', compact('product', 'category', 'imagepivot'));
    }

    public function update($id, Request $request) {
        $product = Product::find($id);
        $image = $product->image_url;
        $input = $request->all();
        $file = (!empty($input['image_url']) ? $input['image_url'] : null);
        $otherFiles = $input;
        $product->code = $input['code'];
        $product->checked = $input['checked'];
        $product->categories_id = $input['category'];
        $product->translateOrNew(LaravelLocalization::setLocale())->title = $input['title'];
        $product->translateOrNew(LaravelLocalization::setLocale())->summary = $input['summary'];
        $product->translateOrNew(LaravelLocalization::setLocale())->description = $input['description'];
        $product->translateOrNew(LaravelLocalization::setLocale())->price = $input['price'];
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
        $imagePivot = $product->image_product()->where('product_id', $id)->get()->toArray();
        $product->delete();
        $image = $product->image_url;
        $product->delete();

        if (!empty($image)) {
            unlink("admin/product/400x300_" . $image);
            unlink("admin/product/600x500_" . $image);
            unlink("admin/product/" . $image);
        }

        if (!empty($imagePivot)) {
            foreach ($imagePivot as $img) {
                unlink("admin/product/600x500_" . $img['image']);
                unlink("admin/product/" . $img['image']);
            }
        }

        return redirect(LaravelLocalization::setLocale() . DIRECTORY_SEPARATOR . 'admin-product')->with('status', 'Категория е изтрита!');
    }

    public function imageEdit(Request $request) {
        $id = $request->route('id');
        
        $imageModel = MyImage::where('id', $id)->first();
        if ($request->isMethod('post')) {
            $imageModelPost = MyImage::where('id', $request->id)->first();       
            $file = $request->image_url;
            $extension = $file->getClientOriginalExtension();
            $fileName = rand(11111, 99999) . '.' . $extension;
            $file->move("admin/product", $fileName);
            $fileThumbBig = "600x500_" . $fileName;
            $imgBigmulty = Image::make("admin/product/$fileName")->resize(600, 500);
            $imgBigmulty->save("admin/product/$fileThumbBig");
            unlink("admin/product/" . $imageModelPost->image);
            unlink("admin/product/600x500_" . $imageModelPost->image);
            $imageModelPost->image=$fileName;
            $imageModelPost->save();
             return redirect()->back()->with('data', ['Успешно редактирахте картинката!']);
           
            
        }
        return view('admin.products.image', compact('imageModel'));
    }

}
