<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }
    
      protected function authenticated($request, $user)
    {
        if($user->role === 'admin') {
            return redirect()->intended('/admin-panel');
        }
        return redirect()->intended('/home');
    }
    
 

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
          $messages = [
            'telephone.required' => 'Полето телефон е задължително!',
            'telephone.size' => 'Полето телефон трябва да бъде по-голямо от 4 цифри!',
            'name.required' => 'Полето име е задължително!',
            'name.size' => 'Полето име е твъдре голямо!',
            'password.required' => 'Полето парола е задължително!',
            'password.confirmed' => 'Полето парола не съвпада!',
            'password.min' => 'Полето парола трябва да е по-голямо от 6 символа!',
            'email.required' => 'Полето имейл е задължително!',
            'email.email' => 'Невалиден имейл формат!',
            'adress.required' => 'Полето адрес е задължително!',
            'adress.size' => 'Полето адрес трябва да е по-голямо от 4 символа!',
            'town.required' => 'Полето град е задължително!',
            'town.size' => 'Полето град трябва да е по-голямо от 2 символа!',
        ];
        return Validator::make($data, [
            'name' => 'required|max:100',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            'telephone'=> 'required|min:5|max:50',
            'adress'=> 'required|min:5|max:255',
            'town'=> 'required|min:4|max:100',
        ],$messages);
    }
    
    

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'telephone' => $data['telephone'],
            'adress' => $data['adress'],
            'town' => $data['town'],
            
        ]);
    }
}
