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
            <div class="grid cart__wrapper--content border--bottom">
                <button class="remove icon-x"></button>
                <img 
                src="./source/img/product-dress/YuooMuoo-New-2017-European-Style-V-neck-Elegant-Women-Autumn-Dress-Fashion-Shine-Green-Knitted-Dress.jpg_640x640.jpg" 
                alt="" class="thumbails">
                <p class="text">Đầm 2 Dây Sọc - Hồng, M</p>
                <div class="price color-c48d56">300.000</div>
                <div>
                    <div class="product__quantity minus">-</div>
                    <input type="number" name="product-quantity" id="" min="0" value="1" class="product__quantity">
                    <div class="product__quantity plus">+</div>
                </div>
                <p class="price color-c48d56">300000</p>
            </div>                
            <div class="grid cart__wrapper--content border--bottom">
                <button class="remove icon-x"></button>
                <img 
                src="./source/img/product-dress/YuooMuoo-New-2017-European-Style-V-neck-Elegant-Women-Autumn-Dress-Fashion-Shine-Green-Knitted-Dress.jpg_640x640.jpg" 
                alt="" class="thumbails">
                <p class="text">Đầm 2 Dây Sọc - Hồng, M</p>
                <div class="price color-c48d56">300.000</div>
                <div>
                    <div class="product__quantity minus">-</div>
                    <input type="number" name="product-quantity" id="" min="0" value="1" class="product__quantity">
                    <div class="product__quantity plus">+</div>
                </div>
                <p class="price color-c48d56">300000</p>
            </div>
            <div class="cart__wrapper grid cart__total">
                <span class="total">TỔNG TIỀN</span>
                <SPAN class="đ total__price" id='total'>750000</SPAN>
            </div>
            <div class="cart__wrapper grid">
                <button type='submit' class="btn upp btn-update">CẬP NHẬT</button>
                <a href="#" class="btn upp btn-checkout">THANH TOÁN</a>
            </div>
        </div>
    </section>


@endsection
