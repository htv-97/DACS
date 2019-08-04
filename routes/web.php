<?php
Route::group(['prefix' => 'source/image'], function () {
    Route::get('product/{image}',['as' => 'image']);
    Route::get('slide/{image}',['as'=>'slideImg']);
    Route::get('news/{image}',['as'=>'newsImg']);
});


Route::group(['prefix' => '/'], function () {
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
    Route::get('checkout',[
        'as' => 'checkout',
        'uses' => 'UserController@getCheckout'
    ]);
    Route::get('quick-buy/{id}', [
        'as' =>'quickBuy',
        'uses' => 'PageController@getQuickBuy'
    ]);
    Route::post('post-checkout',['as'=>'postCheckout','uses'=>'PageController@postCheckout']);
    Route::get('delSession/{sess}',['as'=>'delSession','uses'=>'PageController@getForgotSess']);
    Route::any('search',['as'=>'search','uses'=>'PageController@postSearch']);

    Route::prefix('acount')->group(function () {
        Route::get('login',['as'=>'login-signup','uses'=>'UserController@getFormLogin']);
        Route::post('check-login',['as'=>'login','uses'=>'UserController@postLogin']);
        Route::post('signup',['as'=>'signup','uses'=>'UserController@postSignup']);
        Route::get('logout',['as'=>'logout','uses'=>'UserController@getLogout']);
    });

    Route::prefix('cart')->group(function () {
        Route::get('shopping-cart',['as'=>'shoppingCart','uses'=>'PageController@getshoppingCart']);
        Route::any('add-to-cart/{id}',['as'=>'addToCart','uses'=>'PageController@getAddToCart']);
        Route::get('del/{id}',['as'=>'delCart','uses'=>'PageController@getDelCart']);
        Route::get('qty-cart/{id}',['as'=>'QtyCart','uses'=>'PageController@getQtyCart']);
        Route::get('qty-one-cart/{id}',['as'=>'QtyCart','uses'=>'PageController@getQtyOneCart']);

        // Route::post('update-cart',['as'=>'updateCart','uses'=>'PageController@postUpdateCart']);


    });
    Route::prefix('wishlist')->group(function () {
        Route::get('load',['as'=>'loadWishlist','uses'=>'PageController@getWishlistLoad']);
        Route::get('add/{id}',['as'=>'addWishlist','uses'=>'PageController@getWishlistAdd']);
        Route::get('del/{id}',['as'=>'delWishlist','uses'=>'PageController@getWishlistAdd']);
        Route::get('save',['as'=>'saveWishlist','uses'=>'PageController@getWishlistSave']);
    });
});

Route::group(['prefix' => 'admin','middleware'=>'adminLogin'], function () {
    Route::get('/',function () {
        return view('admin.page.index');
    })->name('index-admin');

    Route::group(['prefix' => 'product-type'], function () {
        Route::get('show',['as'=>'showType','uses'=>'AdminTypeController@showList']);
        Route::post('edit', ['as'=>'editType','uses'=>'AdminTypeController@postEdit']);
        Route::get('del', ['as'=>'delType','uses'=>'AdminTypeController@getDel']);
        Route::get('createPage', function () {
            return view('admin.page.product-type.add');
        })->name('createPage');
        Route::post('create', ['as'=>'createType','uses'=>'AdminTypeController@getCreate']);
    });
    Route::group(['prefix' => 'product'], function () {
        Route::get('show',['as'=>'showProduct','uses'=>'AdminProductController@showList']);
        Route::get('type',['as'=>'showProductType','uses'=>'AdminProductController@showListType']);
        Route::get('detail/{id}', ['as'=>'detailProduct','uses'=>'AdminProductController@getDetail']);
        Route::post('edit', ['as'=>'editProduct','uses'=>'AdminProductController@postEdit']);
        Route::get('new', ['as'=>'newProduct','uses'=>'AdminProductController@getNew']);
        Route::get('del', ['as'=>'delProduct','uses'=>'AdminProductController@getDel']);

    });
    Route::group(['prefix' => 'slide'], function () {
        Route::get('show',['as'=>'showSlide','uses'=>'AdminSlideController@showSlide']);
        Route::post('edit', ['as'=>'editSlide','uses'=>'AdminSlideController@postEdit']);
        Route::get('del', ['as'=>'delSlide','uses'=>'AdminSlideController@getDel']);
    });
    Route::group(['prefix' => 'news'], function () {
        Route::get('show',['as'=>'showNews','uses'=>'AdminNewsController@showNews']);
        Route::post('edit', ['as'=>'editNews','uses'=>'AdminNewsController@postEdit']);
        Route::get('del', ['as'=>'delNews','uses'=>'AdminNewsController@getDel']);
    });    
    Route::group(['prefix' => 'account'], function () {
        Route::get('show',['as'=>'showAccout','uses'=>'AdminAccountController@showAccount']);
        Route::post('edit', ['as'=>'editAccount','uses'=>'AdminAccountController@postEdit']);
        Route::post('create', ['as'=>'createAccount','uses'=>'AdminAccountController@postCreate']);
        Route::get('del', ['as'=>'delAccount','uses'=>'AdminAccountController@getDel']);
    });     
});

