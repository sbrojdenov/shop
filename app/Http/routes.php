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

use Illuminate\Http\Request;

 
  

Route::get('/information', 'CategoryController@information');

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
   Route::group(['prefix' => LaravelLocalization::setLocale()], function() {
        App::setLocale(LaravelLocalization::setLocale());
        Route::get('/', 'HomeController@index');
        Route::get('/category/{slug?}', 'CategoryController@index');
        Route::get('/product/{slug?}', 'CategoryController@product');
        Route::get('/order/{slug?}', 'OrderController@index');
        Route::get('/order/store/{slug?}', 'OrderController@store');
        Route::get('/order/detail/{slug?}', 'OrderController@detail');
        Route::get('/order/delete/{id?}', 'OrderController@delete');
});
});


Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::group(['prefix' => LaravelLocalization::setLocale()], function() {
        App::setLocale(LaravelLocalization::setLocale());
        Route::get('admin-category', ['middleware' => 'admin', 'uses' => 'Admin\CategoryController@category']);
        Route::get('admin-category-edit/{id}', ['middleware' => 'admin', 'uses' => 'Admin\CategoryController@edit']);
        Route::get('admin-category-add/', ['middleware' => 'admin', 'uses' => 'Admin\CategoryController@add']);
        Route::post('admin-category-add/', ['middleware' => 'admin', 'uses' => 'Admin\CategoryController@add']);
        Route::post('admin-category-edit/{id}', ['middleware' => 'admin', 'uses' => 'Admin\CategoryController@update']);
        Route::get('/admin-panel', ['middleware' => 'admin', 'uses' => 'Admin\AdminController@index']);
        Route::get('/admin-users', ['middleware' => 'admin', 'uses' => 'Admin\UsersController@users']);  
        Route::get('/admin-orders', ['middleware' => 'admin', 'uses' => 'Admin\OrdersController@orders']);
        Route::get('/admin-order_delete/{id}', ['middleware' => 'admin', 'uses' => 'Admin\OrdersController@delete']);
        Route::get('/admin-order-edit/{id}', ['middleware' => 'admin', 'uses' => 'Admin\OrdersController@edit']);
        Route::get('admin-product', ['middleware' => 'admin', 'uses' => 'Admin\ProductsController@products']);
        Route::get('admin-product_delete/{id}', ['middleware' => 'admin', 'uses' => 'Admin\ProductsController@delete']);
        Route::get('admin-product-add', ['middleware' => 'admin', 'uses' => 'Admin\ProductsController@add']);
        Route::post('admin-product-add', ['middleware' => 'admin', 'uses' => 'Admin\ProductsController@add']);
        Route::get('admin-product-edit/{id}', ['middleware' => 'admin', 'uses' => 'Admin\ProductsController@edit']);
        Route::post('admin-product-edit/{id}', ['middleware' => 'admin', 'uses' => 'Admin\ProductsController@update']);
        Route::get('admin-slaider', ['middleware' => 'admin', 'uses' => 'Admin\SlaiderController@slaider']);
        Route::get('admin-slaider-add', ['middleware' => 'admin', 'uses' => 'Admin\SlaiderController@add']);
        Route::post('admin-slaider-add', ['middleware' => 'admin', 'uses' => 'Admin\SlaiderController@add']);
        Route::get('admin-slaider-edit/{id}', ['middleware' => 'admin', 'uses' => 'Admin\SlaiderController@edit']);
        Route::post('admin-slaider-edit/{id}', ['middleware' => 'admin', 'uses' => 'Admin\SlaiderController@update']);
        Route::get('admin-slaider_delete/{id?}', ['middleware' => 'admin', 'uses' => 'Admin\SlaiderController@delete']);
        Route::get('admin-category_delete/{id?}', ['middleware' => 'admin', 'uses' => 'Admin\CategoryController@delete']);
        Route::get('admin-products', ['middleware' => 'admin', 'uses' => 'Admin\ProductsController@products']);
        Route::get('admin-users', ['middleware' => 'admin', 'uses' => 'Admin\UsersController@users']);
        Route::get('admin-orders', ['middleware' => 'admin', 'uses' => 'Admin\OrdersController@orders']);
    });

});
