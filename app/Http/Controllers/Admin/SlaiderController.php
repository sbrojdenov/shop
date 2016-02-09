<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Slaider;
use LaravelLocalization;

class SlaiderController extends Controller {

    public function slaider() {
        $slaider = Slaider::all();
        return view('admin.slaider.index', compact('slaider'));
    }

    public function add(Request $request) {

        if ($request->isMethod('post')) {

            $input = $request->all();
            $fileName = null;
            if (!empty($input['image_url'])) {
                $file = $input['image_url'];
                $extension = $file->getClientOriginalExtension();
                $fileName = rand(11111, 99999) . '.' . $extension;
                $file->move("admin/slaider", $fileName);
            }
            
           $slaider= new Slaider();
           $slaider->translateOrNew(LaravelLocalization::setLocale())->name =$input['name'];
           $slaider->translateOrNew(LaravelLocalization::setLocale())->description =$input['description'];
           $slaider->image_url = $fileName;
           $slaider->save();
           return redirect(LaravelLocalization::setLocale().DIRECTORY_SEPARATOR.'admin-slaider');

        }
        return view('admin.slaider.add');
    }

    public function edit($id) {
        $slaider = Slaider::find($id);
        return view('admin.slaider.edit', compact('slaider'));
    }

    public function update($id, Request $request) {
        $slaider = Slaider::find($id);
        $image = $slaider->image_url;
        $input = $request->all();
        $file = (!empty($input['image_url']) ? $input['image_url'] : null);
        $slaider->translateOrNew(LaravelLocalization::setLocale())->name =$input['name'];
        $slaider->translateOrNew(LaravelLocalization::setLocale())->description =$input['description']; 

        if ($file != $image && !empty($file)) {
            $extension = $file->getClientOriginalExtension();
            $fileName = rand(11111, 99999) . '.' . $extension;
            $file->move("admin/slaider", $fileName);
            $slaider->image_url = $fileName;
            unlink("admin/slaider/" . $image);
        }
        $slaider->save();
        return redirect(LaravelLocalization::setLocale().DIRECTORY_SEPARATOR.'admin-slaider');
    }

    public function delete($id) {
        $slaider = Slaider::find($id);
        $image = $slaider->image_url;
        $slaider->delete();
        if(!empty($image)){
        unlink("admin/slaider/" . $image);
        }
        return redirect(LaravelLocalization::setLocale().DIRECTORY_SEPARATOR.'admin-slaider')->with('status', 'Категория е изтрита!');
    }

}
