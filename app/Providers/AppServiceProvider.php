<?php

namespace App\Providers;
use App\Cart;
use App\Wish;
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
        view()->composer(['header','admin.page.product.list','admin.page.product.detail','admin.page.product.create'],function($menu){
            $productType = ProductType::all();
            $menu -> with('productType', $productType); 
        });
        view()->composer(['rightSide','page.shoppingCart','page.checkout'],function($view){
            if(Session('cart')){
                $oldCart=Session::get('cart');
                $cart = new Cart($oldCart);
                $view -> with([
                            'productCart' => $cart->items,
                            'totalPrice' => $cart->totalPrice,
                            'totalQty'  =>  $cart->totalQty
                          ]); 
            }

        });
        view()->composer(['rightSide'], function ($view) {
            if(Session('wishlist')){
                $oldWishlist = SESSION::get('wishlist');
                $wishlist = new Wish($oldWishlist);
                $view -> with(['items'=>$wishlist->items,
                                'totalWish'=>$wishlist->totalQty
                                ]);
            }
        });

       // admin
        // view()->composer('admin.page.product.list', function ($view) {
        //     $loại
        // });

    }
}
