<?php
use App\Http\Middleware\VerifyCsrfToken;
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
Route::get('register', function(){
	return view('auth.register');
})->name('register');
Route::get('login', function(){
	return view('auth.login');
})->name('login');
Route::get('logout', function(){
	Session::forget('user');
	return redirect('login');
})->name('logout');
Route::post('login', 'UserController@login');
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/products', 'ProductController');
Route::resource('/categories', 'CategoryController');
Route::resource('/sliders', 'SlidersController');
Route::resource('/tags', 'TagsController');
Route::resource('/zone', 'ZoneController');
Route::get('/layouts/app', 'FrontController@product_show')->name('layouts.app');
Route::get('/layouts/header/{id}', 'FrontController@category_show');
Route::get('/list/{id}', 'FrontController@detail_show')->name('list');
Route::get('/details/detail/{slug}', 'FrontController@details_show')->name('details');
Route::get('/layouts/policy/', 'FrontController@policy')->name('policy');
Route::post('add_to_cart', 'FrontController@addToCart')->name('add_to_cart');
Route::get('cartList', 'FrontController@cartList')->name('cartList');
Route::get('removecart/{id}', 'FrontController@removeCart')->name('removecart');
Route::get('search', 'FrontController@search')->name('search');
Route::post('rating', 'FrontController@rating')->name('rating');
