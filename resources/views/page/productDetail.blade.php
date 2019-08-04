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
                <a href="{{route('index-page')}}">Trang chủ</a>
                <a href="{{ route('productType',$productType->name)}}">{{$productType->name}}</a>
                <a href="#">{{$product->name}}</a>
            </div>
        </div>                
    </div>

    <!-- show product               -->
    <section>
        <article class="product__show grid">
            <div class="card__img">
                <img src="{{route('image',$product->image)}}" alt="">
                @if(!empty($product->promotion_price))
                    <span class="sales-percent">{{100 - round($product->promotion_price / $product->unit_price * 100).'%'}}</span>
                @endif
            </div>
            <form  method="POST" class="product__show--details grid" action="{{route('addToCart',$product->id)}}">
                @csrf
                <div class="product__show--head">
                    <h2 class="title mb-1">{{$product->name}}</h2>
                    @if(empty($product->promotion_price))
                        <span class="price--huge">{{number_format($product->unit_price,0,',','.')}}</span>
                    @else
                        <span class="price--huge">{{number_format($product->promotion_price,0,',','.')}}</span>
                        <span class="price__through">{{number_format($product->unit_price,0,',','.')}}</span>
                    @endif
                </div>
                <div class="product__show--size">
                    <h3 class="upp">Kích thước</h3>
                    <select name="size" id="product-size">
                        <option value="s">Size S</option>
                        <option value="m">Size M</option>
                        <option value="sm">Size SM</option>
                    </select>
                </div>
                <div class="product__show--quantity">
                    <h3 class="upp">số lượng</h3>
                    <div class="product__quantity minus">-</div><input type="number" name="quantity" id="" min="0" value="1" class="product__quantity"><div class="product__quantity plus">+</div>
                </div>
                    <button type="submit" class="btn upp">Thêm vào giỏ hàng</button>
                <div>
                    <a href="#" class="icon-heart1" data-wishlist='add' data-id="{{$product->id}}"></a><small> Thêm vào danh sách yêu thích</small>
                </div>
                
            </form>
        </article>
    </section>
    <!-- details product -->
    <section id="product-info">
        <ul class="flex">
            <li>
                <h2 class="upp product__details--title" data-show="target" data-target="product-detail">thông tin chi tiết</h2>
            </li>
            <li>
                <h2 class="upp product__details--title" data-show="target" data-target="product-transfer">giao hàng</h2>
            </li>
            <li>
                <h2 class="upp product__details--title" data-show="target" data-target="product-rules"> chính sách hoàn trả</h2>
            </li>
        </ul>
        <div>
            <div class="grid product__detail--info mt-3" id="product-detail">
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
                        <div class="card__img">
                            @if(!empty($item->promotion_price))
                                <span class="sales-percent">{{100 - round($item->promotion_price / $item->unit_price * 100).'%'}}</span>
                            @endif
                            <a href="{{route('productDetail',$item->name)}}" class="link-product"><img src="{{route('image',$item->image)}}" alt=""></a>
                            <a href='{{route('addToCart',$item->id)}}' class="quick-buy">Mua ngay</a>
                        </div>    
                        <div class="card__content">
                        <h3 class="card__title">{{$item->name}}</h3>
                            <div class="card__prices">
                                @if(!empty($item->promotion_price))
                                    <span class="price">{{number_format($item->promotion_price,0,',','.')}}</span>
                                    <span class="price__through">{{number_format($item->unit_price,0,',','.')}}</span>
                                @else
                                    <span class="price">{{number_format($item->unit_price,0,',','.')}}</span>
                                @endif
                                <i class="icon-heart1" data-wishlist='add' data-id="{{$item->id}}"></i>
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
