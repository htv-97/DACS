@extends('master')
@section('home-content1')
    
    <div class="owl-carousel banner dots__inside">
        <a href="#" class="curtain"> <img src="./source/img/banner/banner-1.jpg" alt=""></a>
        <a href="#" class="curtain"><img src="./source/img/banner/banner-2.jpg" alt=""></a>
        <a href="#" class="curtain"><img src="./source/img/banner/banner-3.jpg" alt=""></a>
        <a href="#" class="curtain"><img src="./source/img/banner/banner-4.jpg" alt=""></a>
    </div>
    <section id="product-category">
        <h2 class="title">danh mục sản phẩm</h2>
        <a class="see-more">Xem thêm</a>   
        <div class="owl-carousel-3 show__arr">
            <div class="card">
                <img src="./source/img/product-dress/11525683977921-Navy-Blue--Green-Embroidered-yoke-cape-design-Maxi-2971525683977801-1.jpg" alt="">
                <a href="#" class="card__category">Áo</a>
            </div>
        </div>
    </section>
    <section id="products-trend">
        <h2 class="title">sản phẩm nổi bật</h2>
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
    <section id="products-news">
        <h2 class="title">sản phẩm mới</h2>
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
    {{-- <section id="post">
        <h2 class="title">Tin mới</h2>
        <a class="see-more">Xem thêm</a>   
        <div class="owl-carousel-3 show__dots">
            <a href="#">
                <article class="card card__news">
                    <img src="./source/img/product-dress/11525683977921-Navy-Blue--Green-Embroidered-yoke-cape-design-Maxi-2971525683977801-1.jpg" alt="">
                    <div class="card__content">
                        <h3 class="post__title">Lorem ipsum dolor sit amet consectetur adipisicing elit.</h3>
                    </div>
                </article>
            </a>
        </div>
    </section> --}}
   
    <section>asdasd</section>
    <script src="./source/js/owl.carousel.js"></script>
@endsection

