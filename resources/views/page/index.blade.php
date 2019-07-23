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
                    @if(!empty($item->promotion_price))
                        <span class="sales">{{100 - round($item->promotion_price / $item->unit_price * 100).'%'}}</span>
                    @endif
                <a href="{{route('productDetail',$item->name)}}"><img src="{{route('image',$item->image)}}" alt=""></a>
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
    <section id="products-new">
        <h2 class="title">sản phẩm mới</h2>
        <a href="{{route('productType','hot-trends')}}" class="see-more">Xem thêm</a>   
        <div class="owl-carousel-3 show__arr">
            @foreach ($productNew as $item)
                
                <article class="card card__product">
                    @if(!empty($item->promotion_price))
                        <span class="sales">{{100 - round($item->promotion_price / $item->unit_price * 100).'%'}}</span>
                    @endif
                    <a href="{{route('productDetail',$item->name)}}"><img src="{{route('image',$item->image)}}" alt=""></a>
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
    <section id="products-sale">
        <h2 class="title">sản phẩm đang giảm giá</h2>
        <a href="{{route('productType','sale')}}" class="see-more">Xem thêm</a>   
        <div class="owl-carousel-3 show__arr">
            @foreach ($productSale as $item)
                
                <article class="card card__product">
                    <span class="sales">{{100 - round($item->promotion_price / $item->unit_price * 100).'%'}}</span>
                    <a href="{{route('productDetail',$item->name)}}"><img src="{{route('image',$item->image)}}" alt=""></a>
                    <div class="card__content">
                    <h3 class="card__title">{{$item->name}}</h3>
                        <div class="card__prices">
                            <span>{{$item->promotion_price}}</span>
                            <span>{{$item->unit_price}}</span>
                            <i class="icon-heart1"></i>
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
