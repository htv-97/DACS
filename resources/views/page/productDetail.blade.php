@extends('master')
@section('content')
<?php
    use App\Product;
    use App\ProductType; 
    $productType = ProductType::where('id', '=', $product->id_type)->firstOrFail();
    $productsRelated = Product::where('id_type','=',$product->id_type)->inRandomOrder()->take(5)->get();
?>
    <div class="header-archive">
        <h1 class="title">{{$product->name}}</h1>
        <div class="flex--between-center w-95 border--bottom px-1">
            <div class="redirect-trees">
                <a href="{{URL::asset('./')}}">Trang chủ</a>
                <a href="{{ URL::asset('/category/'.$productType->name)}}">{{$productType->name}}</a>
                <a href="#">{{$product->name}}</a>
            </div>
        </div>                
    </div>

    <!-- show product               -->
    <section>
        <article class="product__show grid">
        <img src="{{route('image',$product->image)}}" alt="">
            <form  method="GET" class="product__show--details grid">
                <div class="product__show--head">
                    <h2 class="title mb-1">{{$product->name}}</h2>
                    @if(empty($product->promotion_price))
                        <span class="price--huge">{{$product->unit_price}}</span>
                    @else
                        <span class="price--huge">{{$product->promotion_price}}</span>
                        <span class="price__sale">{{$product->unit_price}}</span>
                    @endif
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
                <a href="{{route('addToCart',$product->id)}}" type="submit" class="btn upp">Thêm vào giỏ hàng</a>
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
            <a href="{{ route('productType',$productType->name)}}" class="see-more">Xem thêm</a>   
            <div class="owl-carousel-3 show__arr">
                @foreach ($productsRelated as $item)
                    
                    <article class="card card__product">
                        @if(!empty($item->promotion_price))
                            <span class="sales">{{100 - round($item->promotion_price / $item->unit_price * 100).'%'}}</span>
                        @endif
                        <a href="{{route('productDetail',$item->name)}}"><img src="{{URL::asset('source/image/product/'.$item->image)}}" alt=""></a>
                        <div class="card__content">
                        <h3 class="card__title">{{$item->name}}</h3>
                            <div class="card__prices">
                            @if(!empty($item->promotion_price))
                                <span>{{$item->promotion_price}}</span>
                            @endif
                                <span>{{$item->unit_price}}</span>
                                <i class="icon-heart1"></i>
                            </div>
                        </div>
                    </article>
                @endforeach
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
