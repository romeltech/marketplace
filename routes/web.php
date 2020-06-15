<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'PublicPagesController@home')->name('home');
Route::get('/about', 'PublicPagesController@about')->name('about');
Route::get('/contact', 'PublicPagesController@contact')->name('contact');
Route::get('/products', 'PublicPagesController@products')->name('products');
Route::get('/product/{product:slug}', 'PublicPagesController@product')->name('product');

Route::group(['prefix'=>'buyer','as'=>'buyer.'], function(){
    Route::get('/dashboard', 'BuyerController@dashboard')->name('dashboard');
    Route::get('/orders', 'BuyerController@orders')->name('orders');
    Route::get('/inquiries', 'BuyerController@inquiries')->name('inquiries');
    Route::get('/messages', 'BuyerController@messages')->name('messages');
    Route::get('/account-settings', 'BuyerController@accountSettings')->name('account-settings');
});

Route::group(['prefix'=>'seller','as'=>'seller.'], function(){
    Route::get('/dashboard', 'SellerController@dashboard')->name('dashboard');
    Route::get('/products', 'SellerController@products')->name('products');
});