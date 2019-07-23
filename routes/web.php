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
Route::any('source/image/product/{image}',[
    'as' => 'image'
]);
Route::get('/',[
    'as'=>'index-page',
    'uses'=>'PageController@getIndex'
]);
Route::get('category/{productType}',[
    'as' => 'productType',
    'uses' => 'PageController@getProductType'
]);
Route::get('product/{productName}',[
    'as' => 'productDetail',
    'uses' => 'PageController@getProductDetail'
]);
Route::get('news/{newsTitle}',[
    'as' => 'news',
    'uses' => 'PageController@getNews'
]);
Route::get('cart',[
    'as' => 'shoppingCart',
    'uses' => 'PageController@getShoppingCart'
]);
Route::get('login',[
    'as' => 'login-signup',
    'uses' => 'PageController@getPopup'
]);
Route::get('/checkout',[
    'as' => 'checkout',
    'uses' => 'PageController@getCheckout'
]);
Route::get('add-to-cart/{id}', [
    'as' =>'addToCart',
    'uses' => 'PageController@getAddToCart'
]);