<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller {

    public function category(Request $request) {
        $category = Category::all();

        app()->setLocale('bg');
        return view('admin.category.index', compact('category'));
    }

    public function add(Request $request) {
        if ($request->isMethod('post')) {
            $input = $request->all();
            $fileName = null;
            if (!empty($input['image_url'])) {
                $file = $input['image_url'];
                $extension = $file->getClientOriginalExtension();
                $fileName = rand(11111, 99999) . '.' . $extension;
                $file->move("admin/category", $fileName);
            }
            Category::create([
                //'title' => $input['title'],
                'main_category' => $input['main_category'],
                'image_url' => $fileName
            ]);
            
           $test= new Category();
           
   
            $test->translateOrNew('en')->title = "Title asd";
             
            $test->save();
  

            return redirect('admin-category');
        }
        return view('admin.category.add');
    }

    public function edit($id) {
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update($id, Request $request) {
        $category = Category::find($id);
        $image = $category->image_url;
        $input = $request->all();
        $file = (!empty($input['image_url']) ? $input['image_url'] : null);
        $category->title = $input['title'];
        $category->main_category = $input['main_category'];
        if ($file != $image && !empty($file)) {
            $extension = $file->getClientOriginalExtension();
            $fileName = rand(11111, 99999) . '.' . $extension;
            $file->move("admin/category", $fileName);
            $category->image_url = $fileName;
            unlink("admin/category/" . $image);
        }
        $category->save();
        return redirect('admin-category');
    }

    public function delete($id) {
        $category = Category::find($id);
        $image = $category->image_url;
        $category->delete();
        if (!empty($image)) {
            unlink("admin/category/" . $image);
        }
        return redirect('admin-category')->with('status', 'Категория е изтрита!');
    }

}
