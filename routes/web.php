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

// Route::get('/', function () {
//     return view('welcome');
// });

// admin quản trị

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin'], function () {

	Route::get('', 'admin\HomeController@index');

	Route::get('login', 'admin\HomeController@Login');
	Route::post('login', 'admin\HomeController@postLogin');
	Route::get('logout', 'admin\HomeController@Logout');

	// Quản trị loại sản phẩm
	Route::group(['prefix' => 'producttype'], function () {
		Route::get('', 'admin\ProductTypeController@get');
		Route::get('add', 'admin\ProductTypeController@add');
		Route::post('post', 'admin\ProductTypeController@post');
		Route::get('edit/{id}', 'admin\ProductTypeController@edit');
		Route::post('put/{id}', 'admin\ProductTypeController@put');
		Route::get('delete/{id}', 'admin\ProductTypeController@delete');
	});

	// Quản trị sản phẩm
	Route::group(['prefix' => 'product'], function () {
		Route::get('', 'admin\ProductController@get');
		Route::get('add', 'admin\ProductController@add');
		Route::post('post', 'admin\ProductController@post');
		Route::get('edit/{id}', 'admin\ProductController@edit');
		Route::post('put/{id}', 'admin\ProductController@put');
		Route::get('delete/{id}', 'admin\ProductController@delete');
	});

	// Quản trị Slideshow
	Route::group(['prefix' => 'slideshow'], function () {
		Route::get('', 'admin\SlideShowController@get');
		Route::get('add', 'admin\SlideShowController@add');
		Route::post('post', 'admin\SlideShowController@post');
		Route::get('edit/{id}', 'admin\SlideShowController@edit');
		Route::post('put/{id}', 'admin\SlideShowController@put');
		Route::get('delete/{id}', 'admin\SlideShowController@delete');
	});

	// Quản trị KH
	Route::group(['prefix' => 'customer'], function () {
		Route::get('', 'admin\CustomerController@get');
		Route::get('edit/{id}', 'admin\CustomerController@edit');
	});

	// Quản trị tài khoản
	Route::group(['prefix' => 'user'], function () {
		Route::get('', 'admin\UserController@get');
		Route::get('add', 'admin\UserController@add');
		Route::post('post', 'admin\UserController@post');
		Route::get('edit/{id}', 'admin\UserController@edit');
		Route::post('put/{id}', 'admin\UserController@put');
		Route::get('delete/{id}', 'admin\UserController@delete');
	});

	// Quản trị tài khoản
	Route::group(['prefix' => 'order'], function () {
		Route::get('', 'admin\OrderController@get');
		Route::get('edit/{id}', 'admin\OrderController@edit');
	});
});


Route::get('/', [
	'as' => 'trang-chu',
	'uses' => 'PageController@getIndex'
]);

Route::get('loai-san-pham/{type}', [
	'as' => 'loaisanpham',
	'uses' => 'PageController@getLoaiSp'
]);

Route::get('chi-tiet-san-pham/{id}', [
	'as' => 'chitietsanpham',
	'uses' => 'PageController@getChitiet'
]);

Route::get('lien-he', [
	'as' => 'lienhe',
	'uses' => 'PageController@getLienHe'
]);

Route::get('gioi-thieu', [
	'as' => 'gioithieu',
	'uses' => 'PageController@getGioiThieu'
]);

Route::get('add-to-cart/{id}', [
	'as' => 'themgiohang',
	'uses' => 'PageController@getAddtoCart'
]);

Route::get('del-cart/{id}', [
	'as' => 'xoagiohang',
	'uses' => 'PageController@getDelItemCart'
]);
Route::get('dat-hang', [
	'as' => 'dathang',
	'uses' => 'PageController@getCheckout'
]);

Route::post('dat-hang', [
	'as' => 'dathang',
	'uses' => 'PageController@postCheckout'
]);

Route::get('dang-nhap', [
	'as' => 'login',
	'uses' => 'PageController@getLogin'
]);
Route::post('dang-nhap', [
	'as' => 'login',
	'uses' => 'PageController@postLogin'
]);

Route::get('dang-ki', [
	'as' => 'signin',
	'uses' => 'PageController@getSignin'
]);

Route::post('dang-ki', [
	'as' => 'signin',
	'uses' => 'PageController@postSignin'
]);

Route::get('dang-xuat', [
	'as' => 'logout',
	'uses' => 'PageController@postLogout'
]);
