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
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('home', 'HomeController@index');
Route::get('product/{id}', 'ProController@getProduct')->name('product');
Route::get('product_detail/{id}', 'ProController@getdetailPro') -> name ('product_detail');
Route::post('product_detail', 'ProController@updateQty');
Route::get('admin', 'Admin\DashboardController@index');
Route::group(['middleware' => ['checkAdmin']], function () {
	Route::resource('admin/category', 'Admin\CategoryController');
	Route::resource('admin/group', 'Admin\GroupController');
	Route::resource('admin/product', 'ProductController');
	Route::resource('admin/user', 'Admin\UserController');
	Route::resource('admin/order', 'Admin\OrderController');
	Route::get('admin/pro_detail/list/{id}', 'ProController@getEditor') -> name ('admin/pro_detail/list');
}
);

//Route::post('/cart', 'CartController@cart')->name('cart');
Route::get('cart/add/{id}', 'CartController@add');
Route::get('cart/list', 'CartController@index');
// Route::post('/cart', 'CartController@cart');
Route::get('cart/destroy', 'CartController@destroy');
Route::get('cart/remove/{id}', 'CartController@remove');
Route::get('cart/checkout', 'CartController@checkout');
Route::post('cart/order', 'CartController@order');
Route::post('cart/update', 'CartController@updateQty');
Route::get('card/success', 'CartController@success');
Route::resource('admin/order', 'Admin\OrderController');
Route::get('logout', 'Auth\LoginController@logout');
Route::get('order/status', 'CartController@checkStatus')->name('checkStatus');
Route::get('products/search', 'HomeController@search');


//Auth::routes();


