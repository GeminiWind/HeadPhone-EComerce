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
Route::name('about')->get('about', function () {
    return view('customers.about');
});
Route::name('contact')->get('contact', function () {
    return view('customers.contact');
});
Route::group(['namespace' => 'Customer'], function () {
    Auth::routes();
    //Social Login
    Route::get('/redirect/{provider}', 'SocialAuthController@redirect');
    Route::get('/callback/{provider}', 'SocialAuthController@callback');
    //Contact
    Route::post('contact', 'ContactController@handle');
    //Search
    Route::post('/search', 'SearchController@search')->name('search');
    //Comment
    Route::post('/comment', 'CommentController@store')->name('comment.store');
    //Like
    Route::get('/like/{slug}/{target}','LikeController@like')->name('like');
    //Cart
    Route::get('/cart', 'CartController@index')->name('cart.index');
    Route::get('cart/quick-add/{productSlug}', 'CartController@quickAdd')->name('cart.quick-add');
    Route::post('cart/add/{productSlug}', 'CartController@add')->name('cart.add');
    Route::get('/cart/remove/{rowId}', 'CartController@remove')->name('cart.remove');
    Route::get('cart/destroy', 'CartController@removeAll')->name('cart.destroy');
    Route::get('/cart/search/{productId}', 'CartController@search')->name('cart.search');
    //Checkout
    Route::post('/checkout', 'OrderController@checkout')->name('checkout');
    //Order History,Info Customer
    Route::group(['prefix' => 'my'], function () {
        Route::get('/', 'CustomerController@showInfo')->name('customer.info');
        Route::name('customer.change-password')->post('change-password','CustomerController@changePassword');
    });
    //Post
    Route::get('/posts','PostController@index')->name('post.index');
    Route::get('/posts/{postSlug}', 'PostController@show')->name('post.show');
    //Browse
    Route::get('/{categorySlug}', 'CategoryController@show')->name('category.show');
    Route::get('/{categorySlug}/{productSlug}', 'ProductController@show')->name('product.show');
});


Route::get('/home', 'HomeController@index');

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    Route::get('login', 'Auth\LoginController@showLoginForm');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LogOutController@logout')->name('admin.logout');
    Route::get('/', 'AdminController@index');
    Route::resource('category', 'CategoryController');
});