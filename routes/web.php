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
//     return view('layouts/home');
// });
// Route::get('home', 'HomeController@homeDemo');
// Route::get('home/{id}', 'HomeController@homeVariable');

Route::get('/',[
    'name'=>'index-page',
    'uses'=>'PageController@getIndex'
]);
Route::get('product-type',[
    'name' => 'productType',
    'uses' => 'PageController@getProductType'
]);
Route::get('product-detail',[
    'name' => 'productDetail',
    'uses' => 'PageController@getProductDetail'
]);
Route::get('cart',[
    'name' => 'shoppingCart',
    'uses' => 'PageController@getShoppingCart'
]);
Route::get('login',[
    'name' => 'login-signup',
    'uses' => 'PageController@getPopup'
]);
Route::get('checkout',[
    'name' => 'checkout',
    'uses' => 'PageController@getCheckout'
]);