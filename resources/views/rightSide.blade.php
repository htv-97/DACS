<aside class="d__flex " id='rightSide'>
    <ul class="nav__icon" id='extension-icon'>
        <li><a href="#" class="icon-search" data-toggle="target" data-target="search"></a></li>
        @if(Session::has('cart') && $totalQty != 0)
            <li><a href="#" class="icon-cart" style="color:red" data-qty='{{$totalQty}}' data-toggle="target" data-target="cart"></a></li>
        @else 
            <li><a onclick="alert('Chưa có hàng trong giỏ!')" class="icon-cart" title="Chưa có hàng trong giỏ" data-toggle="target" data-target="cart"></a></li>
        @endif
        @if(Auth::check())
            <li><a href="{{route('login-signup')}}" class="icon-{{Auth::user()->gender}} c-red" title='{{Auth::user()->name}}'></a></li>
        @else
            <li><a href="{{route('login-signup')}}" class="icon-user1" title="Click vào để đăng nhập tài khoản!!"></a></li>
        @endif
        @if(SESSION::has('wishlist') && $totalWish != 0)
            <li><a href="#" class="icon-heart1 border-0" data-qty='{{$totalWish}}' data-toggle="target" data-target="wishlist"></a></li>
        @else
            <li><a class="icon-heart1 border-0"  data-toggle="target" data-target="wishlist"></a></li>
        @endif
    </ul>
    <div class="extension">
        <form class="search" id="search" method="get" action="{{route('search')}}">
            <div class="grid__head-quick-seen mb-3"><strong class="upp">Tìm kiếm</strong><i class="icon-x1" data-toggle="gparent"></i></div> 
            <input type="text" name="key" placeholder="Nhập sản phẩm cần tìm...">
        </form>
        @if(Session::has('cart') && $totalPrice != 0)
        <form id="cart" onsubmit="return false;"> 
            @csrf
            <div class="grid__head-quick-seen mb-5"><strong class="upp">Giỏ hàng</strong><i class="icon-x1" data-toggle="gparent"></i></div> 
            <div class="cart__list">
                @foreach ($productCart as $product)
                    <div class="cart__wrapper grid mb-3">
                        <img src="{{route('image',$product['item']->image)}}" alt="">
                        
                        <div>
                            <div class="grid__head-quick-seen mb-1">
                                <strong>{{$product['item']->name}}</strong>
                                <i class="icon-x1" data-id='{!!$product['item']->id!!}' ajax-remove='cart'></i>
                                <small class="price text">{{number_format($product['priceItem'],0,",",".")}}</small>
                            </div>
                            <div class="card__prices">
                                <div class="product__quantity minus" data-type='-1'>-</div>
                                <input type="number" data-id='{!!$product['item']->id!!}' data-price='{!!$product['priceItem']!!}' name="product-quantity" min="0" value="{{$product['qty']}}" class="product__quantity">
                                <div class="product__quantity plus" data-type='1'>+</div>
                                <span data-price-total='{{$product['price']}}'>{{number_format($product['price'],0,",",".")}}</span>
                            </div>
                        </div>
                    </div>
                @endforeach    

            </div>   
            
            <div class="cart__total flex pt-2">
                <span>TỔNG TIỀN</span>
                <SPAN class="price price__total" id='totalPrices'>{{number_format($totalPrice,0,",",".")}}</SPAN>
            </div>
            <div class="cart__button grid mt-3">
                {{-- <button type='submit' class="btn upp">CẬP NHẬT GIỎ HÀNG</button> --}}
                <a href="{{route('delSession','cart')}}" type='submit' class="btn upp">XÓA GIỎ HÀNG</a>
                <a href="{{route('shoppingCart')}}" class="btn upp">Đến giỏ hàng</a>
            </div>
        </form>
        @endif
        
        <div class="wishlist" id="wishlist">
            <div class="grid__head-quick-seen mb-5"><strong class="upp">wishlist</strong><i class="icon-x1" data-toggle="gparent"></i></div> 
            <div class="cart__list" id='wishlist_content'>  
                @if (Session::has('wishlist') && $totalWish!=0)
                    @foreach ($items as $item)
                        <div class="cart__wrapper grid mb-3">
                            <img src="{{route('image',$item['image'])}}" alt="">
                            
                            <div>
                                <div class="grid__head-quick-seen mb-1">
                                    <strong>{{$item['name']}}</strong>
                                    <i class="icon-x1" data-id='{!!$item['id']!!}' ajax-remove='wishlist'></i>
                                </div>
                                <div class="card__prices">
                                    @if($item['isSale'])
                                        <span class="price">{{number_format($item['promotion_price'],0,',','.')}}</span>
                                        <span class="price__through">{{number_format($item['unit_price'],0,',','.')}}</span>
                                    @else
                                        <span class="price">{{number_format($item['unit_price'],0,',','.')}}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="flex-center txt-center" style="min-height:200px;line-height:1.7;">Chưa có sản phẩm nào được bạn thích!</div>
                @endif    
            </div>    
            <div class="cart__button grid mt-3">
                @if(SESSION::has('error'))
                    <script>
                        confirm(`{{SESSION::get('error')}}`);
                    </script>
                @elseif(SESSION::has('success'))
                    <script>
                        alert(`{{SESSION::get('success')}}`);
                    </script>
                @endif
                <a href='{{route("saveWishlist")}}'  class="btn upp">Lưu wishlist</button>
                <a href="{{route("delSession",'wishlist')}}" remove-storage='wishlist' class="btn upp" form="wishlist">Xóa wishlish</a>
            </div>            
        </div>
 
    </div>         
</aside>
