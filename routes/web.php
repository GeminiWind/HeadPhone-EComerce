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

Route::name('index')->get('/', function () {

    return view('customers.home');
});
Route::group(['prefix' => 'my'], function () {
    Route::name('change-password')->get('change-password', function () {
        return view('customers.change_password');
    });
    Route::name('change-info')->get('change-info', function () {
        return view('customers.change_infor');
    });
    Route::get('info', function () {
        return view('customers.profile');
    });
});
Route::get('search', function () {
    return view('customers.search');
});

Route::get('test', function () {
    return view('profile');
});
Route::get('home', function () {
    return view('customers.home');
});

Route::get('change-password', function () {
    return view('customers.change_password');
});
Route::get('infor', function () {
    return view('customers.change_infor');
});

Route::get('search', function () {
    return view('customers.search');
});

Route::get('test', function () {
    return view('profile');
});

Route::group(['namespace' => 'Customer'], function () {
    Auth::routes();
});

Route::get('/home', 'HomeController@index');

Route::post('product','ProductController@addProduct');
Route::get('delete/product/{id}','ProductController@deleteProduct');


Route::post('edit/product/{id}','ProductController@editProduct');