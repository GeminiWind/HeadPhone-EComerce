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
});
Route::get('search', function () {
    return view('customers.search');
});
Route::group(['namespace' => 'Customer'], function(){
    Auth::routes();
});
Route::get('/home', 'HomeController@index');
Route::group(['prefix' => 'cate'], function(){
    Route::get('add', ['as' =>'admin.category.store', 'uses'=> 'CateController@getAddCate']);
    Route::post('add', ['as' =>'admin.cate-post', 'uses' =>'CateController@postAddCate']);
});
Route::get('dang-nhap',function(){
	return view('customers.login_customer');
});
Route::get('dang-ky',function(){
	return view('customers.signup_customer');
});
Route::get('product-detail', function(){
	return view('customers.product_detail');
});
Route::resource('category', 'CategoryController');
