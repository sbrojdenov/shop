<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class UsersController extends Controller {

    public function users() {

        $users = User::all();
        return view('admin.users.index',compact('users'));
    }

}
