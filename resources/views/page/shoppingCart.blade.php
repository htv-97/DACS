@extends('master')
@section('content')
    <section >
        <center><h1 class="title upp">Trang giỏ hàng</h1></center>
        <form class="cart__shopping">
            <div class="grid cart__wrapper--head">
                <h2 class="upp">Xóa</h2>
                <h2 class="upp">Hình</h2>
                <h2 class="upp">sản phẩm</h2>
                <h2 class="upp">giá</h2>
                <h2 class="upp">số lượng</h2>
                <h2 class="upp">tổng</h2>
            </div>
            @if(Session::has('cart') && $totalQty != 0)
                @foreach ($productCart as $product)
                    <div class="cart__wrapper--content grid border--bottom">
                        <span class="icon-x" ajax-remove='cart' data-id='{!!$product['item']->id!!}'></span>
                        <img 
                        src="{{route('image',$product['item']->image)}}" 
                        alt="" class="thumbails">
                        <p class="text">{{$product['item']->name}}</p>
                        <div class="price color-c48d56">{{number_format($product['priceItem'],0,',','.')}}</div>
                        <div>
                            <div class="product__quantity minus" data-type='-1'>-</div>
                            <input type="number" data-id='{!!$product['item']->id!!}' data-price='{!!$product['priceItem']!!}' name="product-quantity" min="0" value="{{$product['qty']}}" class="product__quantity">
                            <div class="product__quantity plus" data-type='1'>+</div>
                        </div>
                        <p class="price color-c48d56" data-price-total='{{$product['price']}}'>{{number_format($product['price'],0,",",".")}}</p>
                    </div>                
                @endforeach
            @else
                <center><h2 class="py-1" style="margin:5rem auto">Chưa có đồ trong giỏ hàng....</h2></center>
            @endif
            <div class="cart__wrapper grid cart__total pt-2">
                <span class="total">TỔNG TIỀN</span>
                @if(Session::has('cart'))
                <SPAN class="price total__price" id='totalPrices'>{{number_format($totalPrice,0,',','.')}}</SPAN>
                @else
                <SPAN class="price total__price" id='totalPrices'>0</SPAN>
                @endif
            </div>
            <div class="cart__wrapper grid">
                <button type='submit' class="btn upp btn-update">CẬP NHẬT</button>
                <a href="{{route('checkout')}}" class="btn upp btn-checkout">THANH TOÁN</a>
            </div>
        </form>
    </section>


@endsection
