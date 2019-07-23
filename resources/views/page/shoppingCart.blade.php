@extends('master')
@section('content')
    <section >

        <div class="cart__shopping">
            <div class="grid cart__wrapper--head">
                <span></span><span></span>
                <h2 class="upp">sản phẩm</h2>
                <h2 class="upp">giá</h2>
                <h2 class="upp">số lượng</h2>
                <h2 class="upp">tổng</h2>
            </div>
            @foreach ($productCart as $product)
                <div class="grid cart__wrapper--content border--bottom">
                    <button class="remove icon-x"></button>
                    <img 
                    src="{{route('image',$product['item']->image)}}" 
                    alt="" class="thumbails">
                    <p class="text">{{$product['item']->name}}</p>
                    <div class="price color-c48d56">{{$product['item']->unit_price}}</div>
                    <div>
                        <div class="product__quantity minus">-</div>
                        <input type="number" name="product-quantity" id="" min="0" value="{{$product['qty']}}" class="product__quantity">
                        <div class="product__quantity plus">+</div>
                    </div>
                    <p class="price color-c48d56">{{$product['qty']*$product['item']->unit_price}}</p>
                </div>                
            @endforeach
            <div class="cart__wrapper grid cart__total">
                <span class="total">TỔNG TIỀN</span>
                <SPAN class="price total__price" id='total'>{{$totalPrice}}</SPAN>
            </div>
            <div class="cart__wrapper grid">
                <button type='submit' class="btn upp btn-update">CẬP NHẬT</button>
                <a href="#" class="btn upp btn-checkout">THANH TOÁN</a>
            </div>
        </div>
    </section>


@endsection
