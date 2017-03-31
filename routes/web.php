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

Route::get('trangchu', function () {
<<<<<<< HEAD
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
=======
	return view('customers.home');
});
Route::get('change-password',function(){
	return view('customers.change_password');
});
Route::get('infor',function(){
	return view('customers.change_infor');
});

Route::get('search',function(){
	return view('customers.search');
});


Route::get('test',function(){
	return view('profile');
});
>>>>>>> 20204ac5e8f072e2691d70ce7735682debbe8e6f
