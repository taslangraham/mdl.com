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

Route::get('/home', 'HomeController@index')->name('home');




Route::middleware('role:customer')->group(function () {
    //place all routes accessible ONLY by a logged in customer here
});


Route::middleware('role:admin')->group(function () {
    //place all routes accessible ONLY by a logged admin her
});


Route::middleware(['role:admin', 'role:clerk'])->group(function () {
    //place all routes accessible to BOTH a logged in admin and clerk
});
