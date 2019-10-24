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


Route::middleware('role:customer')->group(function () {
    //place all routes accessible ONLY by a logged in customer here
});


Route::middleware(['role:admin', 'auth'])->prefix('admin')->group(function () {
    //place all routes accessible ONLY by a logged admin her
    Route::get('/products', [
        'uses' => 'ProductsController@index', 'as' => 'admin.products'
    ]);

    Route::post('/product/save', [
        'uses' => 'ProductsController@store', 'as' => 'admin.product.save'
    ]);

    Route::get('/product/create', [
        'uses' => 'ProductsController@create', 'as' => 'admin.products.new'
    ]);

    Route::get('/product/view/{id}', [
        'uses' => 'ProductsController@show', 'as' => 'admin.product.view'
    ]);

    Route::post('/product/update/{id}', [
        'uses' => 'ProductsController@update', 'as' => 'admin.product.update'
    ]);

    Route::get('/product/delete/{id}', [
        'uses' => 'ProductsController@destroy', 'as' => 'admin.product.delete'
    ]);

});


Route::middleware(['role:admin', 'role:clerk'])->group(function () {
    //place all routes accessible to BOTH a logged in admin and clerk
});
