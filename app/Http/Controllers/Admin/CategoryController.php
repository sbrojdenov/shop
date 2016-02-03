<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Category;


class CategoryController extends Controller {

    public function category() {
        $category=  Category::all();
        return view('admin.category.index',compact('category'));
    }

    public function add(Request $request) {
       if ($request->isMethod('post')) {
          $input = $request->all();
          $fileName=null;
          if(!empty($input['image_url'])){
          $file=$input['image_url'];
          $extension = $file->getClientOriginalExtension();
          $fileName = rand(11111, 99999) . '.' . $extension;
          $file->move("admin/category", $fileName);
          }
         Category::create([
            'title' => $input['title'],
            'main_category' => $input['main_category'],
            'image_url'=> $fileName
        ]);
          
          return redirect('admin-category');
       }
        return view('admin.category.add');
    }

    public function edit($id) {
        $category=  Category::find($id);
        return view('admin.category.edit',compact('category'));
    }
    
     public function delete($id) {
        $category=  Category::find($id);
        $category->delete();
        return redirect('admin-category')->with('status', 'Категория е изтрита!');
       
    }
    
    

}
