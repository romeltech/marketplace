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