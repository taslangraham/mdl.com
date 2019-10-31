<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('HOME');

Route::get('/store', 'ProductsController@all')->name('products.all');

Route::get('/product/view/{productId}', [
    'uses' => 'ProductsController@getProductById', 'as' => 'product.singleProduct'
]);

Route::middleware(['role:customer', 'auth'])->prefix('customer')->group(function () {
    //place all routes accessible ONLY by a logged in customer here
    Route::post('/cart/addItem/{productId}', [
        'uses' => 'CartController@create', 'as' => 'addToCart'
    ]);

    Route::get("/cart", [
        'uses' => 'CustomerController@viewCart', 'as' => 'customer.cart'
    ]);
});


Route::middleware(['role:admin', 'auth'])->prefix('admin')->group(function () {
    //place all routes accessible ONLY by a logged admin has
    route::get('/', [
        'uses' => 'AdminController@index', 'as' => 'admin.home'
    ]);

    Route::get('product/delete/{id}', [
        'uses' => 'ProductsController@destroy', 'as' => 'product.delete'
    ]);

});

Route::middleware(['role:admin|clerk', 'auth'])->prefix('product')->group(function () {
    //place all routes accessible to BOTH a logged in admin and clerk

    Route::get('/', [
        'uses' => 'ProductsController@index', 'as' => 'products'
    ]);

    Route::post('/save', [
        'uses' => 'ProductsController@store', 'as' => 'product.save'
    ]);

    Route::get('/create', [
        'uses' => 'ProductsController@create', 'as' => 'product.new'
    ]);

    Route::get('/edit/{id}', [
        'uses' => 'ProductsController@show', 'as' => 'product.view'
    ]);

    Route::post('update/{id}', [
        'uses' => 'ProductsController@update', 'as' => 'product.update'
    ]);


});
