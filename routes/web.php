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


// Route::get('/', 'HomeController@index'); //using the name method is to  specify a special rout name for this maybe to replace the controller method put route is actually pointing to
// Route::get('/item','productController@index');
Route::get('/items/{slug}', 'productController@show');

Route::get('/',  'productController@index');
Auth::routes(['login' => false, 'register' => false]);


// Route::get('/cartImage', 'productController@backTocartIndexPage');

Route::get('/cart', 'controlCart@index');
Route::post('/cart/saveForLater/{id}','controlCart@saveForLater');
Route::post('/cart/add', 'controlCart@store');

Route::get('/cart/pay', 'controlCart@pay');

Route::post('/cart/moveToCheckout/{id}', 'controlCart@moveToLater');

Route::delete('/cart/del/{id}', 'controlCart@destroy');
Route::delete('/cart/delSaveForLater/{id}', 'controlCart@delSaveForLater');
