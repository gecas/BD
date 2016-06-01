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


Route::group(['middleware' => 'web'], function () {

	Route::auth();

	Route::get('/', 'PagesController@index');

    Route::get('/users/{id}', 'UsersController@profile');

	Route::get('/dashboard', 'DashboardController@index');

    Route::resource('/dashboard/products', 'ProductsController');

    Route::get('/prekes/{slug}', 'ProductsController@show');

    Route::put('/dashboard/products/{id}/update', 'ProductsController@update');

    Route::post('/dashboard/products/images', 'ProductsController@store');

    Route::post('/dashboard/products/images/update', 'ProductsController@update');

    Route::resource('/dashboard/brands', 'BrandsController');

    Route::resource('/dashboard/categories', 'CategoriesController');   

    Route::get('/products', 'ProductsController@products');
    Route::get('/products/Ajax', 'ProductsController@productsAjax');

    Route::get('/kategorija/{slug}', 'ProductsController@getCategoryProducts');

    Route::get('/brand/{slug}', 'ProductsController@getBrandProducts');


    Route::post('/products/cartCount', 'CartController@countCart');
    Route::post('/products/cart/edit', 'CartController@editCart');
    Route::put('/products/cart/{id}', 'CartController@cart');

    Route::get('/cart', 'CartController@show');
    //Route::get('/cartAjax', 'CartController@cartAjax');
    Route::post('/cart/remove/{id}', 'CartController@removeFromCart');
    Route::get('/cart/checkout', 'CartController@checkout');
    Route::get('/cart/checkout/guest', 'CartController@guestCheckout');
    //Route::post('/cart/checkout/guest', 'UsersController@addUser');
    Route::get('/cart/checkout/confirm', 'CartController@confirmCheckout');

    Route::post('/cart/checkout/pay', 'CartController@postCheckout');

    });
