<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getIndex(){
        return view('page.index');
    }
    public function getProductType(){
        return view('page.productType');
    }
    public function getProductDetail(){
        return view('page.productDetail');
    }    
    public function getShoppingCart(){
        return view('page.shoppingCart');
    }    
    public function getPopup(){
        return view('page.login-signup');
    }    
    public function getCheckout(){
        return view('page.checkout');
    }
}
