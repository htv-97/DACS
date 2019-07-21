@extends('master')
@section('content')
    <div class="flex--between-center w-100 border--bottom">
        <div class="redirect-trees">
            <a href="./">Trang chủ</a>
            <a href="./product-type">Đầm</a>
            <a href="#">Đầm xanh váy xòe</a>
        </div>
    </div>  
    <!-- show product               -->
    <section>
        <article class="product__show grid">
            <img src="./source/img/product-dress/YuooMuoo-New-2017-European-Style-V-neck-Elegant-Women-Autumn-Dress-Fashion-Shine-Green-Knitted-Dress.jpg_640x640.jpg" alt="">
            <form  method="GET" class="product__show--details grid">
                <div class="product__show--head">
                    <h2 class="title mb-1">Quần Chino</h2>
                    <span class="price--huge">300.000</span>
                </div>
                <div class="product__show--size">
                    <h3 class="upp">Kích thước</h3>
                    <select name="product-size" id="product-size">
                        <option value="s">Size S</option>
                        <option value="m">Size M</option>
                        <option value="sm">Size SM</option>
                    </select>
                </div>
                <div class="product__show--quantity">
                    <h3 class="upp">số lượng</h3>
                    <div class="product__quantity minus">-</div><input type="number" name="product-quantity" id="" min="0" value="1" class="product__quantity"><div class="product__quantity plus">+</div>
                </div>
                <button type="submit" class="btn upp">Thêm vào giỏ hàng</button>
                <div>
                    <a href="#" class="icon-heart1"></a><small> Thêm vào danh sách yêu thích</small>
                </div>
                
            </form>
        </article>
    </section>
    <!-- details product -->
    <section>
        <ul class="flex">
            <li>
                <h2 class="upp product__details--title" data-show="target" data-target="product-info">thông tin chi tiết</h2>
            </li>
            <li>
                <h2 class="upp product__details--title" data-show="target" data-target="product-transfer">giao hàng</h2>
            </li>
            <li>
                <h2 class="upp product__details--title" data-show="target" data-target="product-rules"> chính sách hoàn trả</h2>
            </li>
        </ul>
        <div>
            <div class="grid product__detail--info mt-3" id="product-info">
                <h3 class="text">Miêu tả</h3>
                <p class="text">Quần ống cao, có túi phía trước và túi may viền phía sau</p>
                <h3 class="text">Đặc tính</h3>
                <p class="text">Quần ống cao, có túi phía trước và túi may viền phía sau</p>
                <h3 class="text">Thể loại</h3>
                <p class="text">Quần ống cao, có túi phía trước và túi may viền phía sau</p>
                <h3 class="text">Màu sắc</h3>
                <p class="text">Quần ống cao, có túi phía trước và túi may viền phía sau</p>
                <h3 class="text">Vật liệu</h3>
                <p class="text">Quần ống cao, có túi phía trước và túi may viền phía sau</p>

            </div>
            <div class="grid product__detail--info mt-3" id="product-transfer">
                <h3 class="text">Giao hàng</h3>
                <p class="text">Quần ống cao, có túi phía trước và túi may viền phía sau</p>
                <h3 class="text">Đặc tính</h3>
                <p class="text">Quần ống cao, có túi phía trước và túi may viền phía sau</p>
                <h3 class="text">Thể loại</h3>
                <p class="text">Quần ống cao, có túi phía trước và túi may viền phía sau</p>
                <h3 class="text">Màu sắc</h3>
                <p class="text">Quần ống cao, có túi phía trước và túi may viền phía sau</p>
                <h3 class="text">Vật liệu</h3>
                <p class="text">Quần ống cao, có túi phía trước và túi may viền phía sau</p>

            </div>
            <div class="grid product__detail--info mt-3" id="product-rules">
                <h3 class="text">Chính sách hoàn trả</h3>
                <p class="text">Quần ống cao, có túi phía trước và túi may viền phía sau</p>
                <h3 class="text">Đặc tính</h3>
                <p class="text">Quần ống cao, có túi phía trước và túi may viền phía sau</p>
                <h3 class="text">Thể loại</h3>
                <p class="text">Quần ống cao, có túi phía trước và túi may viền phía sau</p>
                <h3 class="text">Màu sắc</h3>
                <p class="text">Quần ống cao, có túi phía trước và túi may viền phía sau</p>
                <h3 class="text">Vật liệu</h3>
                <p class="text">Quần ống cao, có túi phía trước và túi may viền phía sau</p>

            </div>
        </div>

    </section>
    <section >
            <h2 class="title">sản phẩm tương tự</h2>
            <a class="see-more">Xem thêm</a>   
            <div class="owl-carousel-3 show__arr">
                <article class="card card__product">
                    <span class="sales">-40%</span>
                    <a href="./source/html/product.html"><img src="./source/img/product-dress/11525683977921-Navy-Blue--Green-Embroidered-yoke-cape-design-Maxi-2971525683977801-1.jpg" alt=""></a>
                    <div class="card__content">
                        <h3 class="card__title">Đầm knot đen màu trơn công sở</h3>
                        <div class="card__prices">
                            <span>300.000</span>
                            <span>500.000</span>
                            <i class="icon-heart1"></i>
                        </div>
                    </div>
                </article>
            </div>
        </section>
    
    <script>
        $('.product__detail--info').not(':first').hide(300);
        $('.product__details--title').click(function(){
            $('.product__details--title').removeClass('active');
            $(this).addClass('active');
        })
    </script>

@endsection
