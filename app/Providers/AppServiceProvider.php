<?php

namespace App\Providers;
use App\Cart;
use App\ProductType;
use Session;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('header',function($menu){
            $loai_sp = ProductType::all();
            $menu -> with('loai_sp', $loai_sp); 
        });
        view()->composer(['rightSide','page.shoppingCart'],function($view){
            if(Session('cart')){
                $oldCart=Session::get('cart');
                $cart = new Cart($oldCart);
            }
            $view -> with(['cart' => Session::get('cart'),
                            'productCart' => $cart->items,
                            'totalPrice' => $cart->totalPrice,
                            'totalQty'  =>  $cart->totalQty
                          ]); 
        });
    }
}
