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


// Route::get('/', 'HomeController@index')->name('home'); //using the name method is to  specify a special rout name for this maybe to replace the controller method put route is actually pointing to
// Route::get('/item','productController@index');
Route::get('/items/{slug}', 'productController@show');

Auth::routes();

Route::get('/home', 'productController@index')->name('homme');
