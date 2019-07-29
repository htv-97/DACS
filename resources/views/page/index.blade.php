@extends('master')
@section('content')
    
    <div class="owl-carousel banner dots__inside">
        @foreach ($slides as $item)
            <a href="#" class="curtain"> <img src="{{URL::asset('source/image/slide/'.$item->image)}}" alt=""></a>
        @endforeach
    </div>
    <section id="product-category">
        <h2 class="title">danh mục sản phẩm</h2>
        {{-- <a href="{{URL::asset('product/')}}" class="see-more">Xem thêm</a>    --}}
        <div class="owl-carousel-3 show__arr">
            @foreach ($productType as $item)
                <div class="card">
                    <img src="{{route('image',$item->image)}}" alt="">
                    <a href="{{route('productType',$item->name)}}" class="card__category">{{$item->name}}</a>
                </div>
            @endforeach

        </div>
    </section>
    <section id="products-trend">
        <h2 class="title">sản phẩm nổi bật</h2>
        <a href="{{route('productType','feature')}}" class="see-more">Xem thêm</a>   
        <div class="owl-carousel-3 show__arr">
            @foreach ($productFeature as $item)
                <article class="card card__product">
                    <div class="card__img">
                        @if(!empty($item->promotion_price))
                            <span class="sales-percent">{{100 - round($item->promotion_price / $item->unit_price * 100).'%'}}</span>
                        @endif
                        <a href="{{route('productDetail',$item->name)}}"><img src="{{route('image',$item->image)}}" alt=""></a>
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
    <section id="products-new">
        <h2 class="title">sản phẩm mới</h2>
        <a href="{{route('productType','hot-trends')}}" class="see-more">Xem thêm</a>   
        <div class="owl-carousel-3 show__arr">
            @foreach ($productNew as $item)
                <article class="card card__product">
                    <div class="card__img">
                        @if(!empty($item->promotion_price))
                            <span class="sales-percent">{{100 - round($item->promotion_price / $item->unit_price * 100).'%'}}</span>
                        @endif
                        <a href="{{route('productDetail',$item->name)}}"><img src="{{route('image',$item->image)}}" alt=""></a>
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
    <section id="products-sale">
        <h2 class="title">sản phẩm đang giảm giá</h2>
        <a href="{{route('productType','sale')}}" class="see-more">Xem thêm</a>   
        <div class="owl-carousel-3 show__arr">
            @foreach ($productSale as $item)
                
                <article class="card card__product">
                    <div class="card__img">
                        @if(!empty($item->promotion_price))
                            <span class="sales-percent">{{100 - round($item->promotion_price / $item->unit_price * 100).'%'}}</span>
                        @endif
                        <a href="{{route('productDetail',$item->name)}}"><img src="{{route('image',$item->image)}}" alt=""></a>
                        <a href='{{route('addToCart',$item->id)}}' class="quick-buy">Mua ngay</a>
                    </div>    
                    <div class="card__content">
                    <h3 class="card__title">{{$item->name}}</h3>
                        <div class="card__prices">
                            <span class="price">{{$item->promotion_price}}</span>
                            <span class="price__through">{{$item->unit_price}}</span>
                            <i class="icon-heart1" data-wishlist='add' data-id="{{$item->id}}"></i>
                        </div>
                    </div>
                </article>
            @endforeach

        </div>
    </section>    
    <section id="post">
        <h2 class="title">Tin mới</h2>
        {{-- <a class="see-more">Xem thêm</a>    --}}
        <div class="owl-carousel-3 show__dots">
            @foreach ($news as $item)
                
            <a href="{{route('news',$item->title)}}">
                    <article class="card card__news">
                        <img src="{{route('image',$item->image)}}" alt="">
                        <div class="card__content">
                        <h3 class="post__title">{{$item->title}}</h3>
                        </div>
                    </article>
                </a>
            
            @endforeach

        </div>
    </section>


@endsection
