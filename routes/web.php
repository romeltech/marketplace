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

Route::post('/product/store', 'ProductController@store');
Route::post('/product/update/{id}', 'ProductController@update');
Route::post('/product/inquire', 'ProductController@inquire');

Route::get('/products', 'PublicPagesController@products')->name('products');
Route::get('/product/{product:slug}', 'PublicPagesController@product')->name('product');

Route::group(['prefix'=>'c','as'=>'c.'], function(){
    Route::get('/inquiries', 'InquiriesController@getInquiries')->name('get-inquiries');
});

Route::group(['prefix'=>'buyer','as'=>'buyer.'], function(){
    Route::get('/dashboard', 'BuyerController@dashboard')->name('dashboard');
    Route::get('/orders', 'BuyerController@orders')->name('orders');
    Route::get('/inquiries', 'BuyerController@inquiries')->name('inquiries');
    Route::get('/inquiry/{id}', 'BuyerController@inquiry')->name('inquiry');
    Route::get('/get-inquiry/{id}', 'InquiriesController@getInquiryById')->name('get-inquiry-by-id');
    Route::get('/messages', 'BuyerController@messages')->name('messages');
    Route::get('/account-settings', 'BuyerController@accountSettings')->name('account-settings');
});



Route::group(['prefix'=>'seller','as'=>'seller.'], function(){
    // Pages
    Route::get('/', 'SellerController@dashboard')->name('dashboard');
    Route::get('/dashboard', 'SellerController@dashboard')->name('dashboard');
    Route::get('/products', 'SellerController@products')->name('products');
    Route::get('/orders', 'SellerController@orders')->name('orders');
    Route::get('/leads', 'SellerController@leads')->name('leads');
    Route::get('/lead/{id}', 'SellerController@lead')->name('lead');
    Route::get('/messages', 'SellerController@messages')->name('messages');
    
    // Actions
    Route::get('/get-products', 'ProductController@index');
    Route::get('/product/get/{id}', 'ProductController@getProduct')->name('get-product-by-id');
    Route::get('/product/create', 'SellerController@create');
    Route::get('/products/{page}', 'SellerController@dashboard');
    Route::get('/product/edit/{id}', 'SellerController@dashboard')->name('edit.product');
    
    Route::get('/get-leads', 'SellerController@getLeads');
    Route::get('/get-lead/{id}', 'SellerController@getLead')->name('get-lead-by-id');
    Route::get('/read-lead/{id}', 'SellerController@readLead')->name('update-read');
});