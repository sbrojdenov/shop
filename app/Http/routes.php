<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/category/{id?}','CategoryController@index');

Route::get('/product/{name?}','CategoryController@product');

Route::get('/order/{name?}','CategoryController@order');

Route::get('/information','CategoryController@information');

Route::get('/admin','Admin\AdminController@index');

Route::get('admin-slaider','Admin\SlaiderController@slaider');

Route::get('admin-category','Admin\CategoryController@category');

Route::get('admin-category-add','Admin\CategoryController@add');

Route::post('admin-category-add','Admin\CategoryController@add');

Route::get('admin-category-edit/{id?}','Admin\CategoryController@edit');

Route::post('admin-category-edit/{id?}','Admin\CategoryController@edit');

Route::get('admin-category_delete/{id?}','Admin\CategoryController@delete');

Route::get('admin-products','Admin\ProductsController@products');

Route::get('admin-users','Admin\UsersController@users');

Route::get('admin-orders','Admin\OrdersController@orders');
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
});
