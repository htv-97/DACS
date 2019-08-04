@extends('master')
@section('content')
    <div class="header-archive">
        <h1 class="title">Tìm: {{$dataSearch}}</h1>
        <div class="flex--between-center w-95 border--bottom px-1">
            <div class="redirect-trees">
                <a href="{{route('index-page')}}">Trang chủ</a>
                <a>Search</a>
                <a href="#">{{$dataSearch}} <span> ({{count($products)}})</span></a>
                
            </div>
            <input type="text" name="" id="search-keyup" placeholder="Tìm theo tên sản phẩm...">
        </div>                
    </div>
    <section>  
        @if(count($products) != 0)      
            <div class="grid__products-list">
                @foreach ($products as $item)
                    <article class="card card__product">
                        <div class="card__img">
                            @if(!empty($item->promotion_price))
                                <span class="sales-percent">{{100 - round($item->promotion_price / $item->unit_price * 100).'%'}}</span>
                            @endif
                            <a href="{{route('productDetail',$item->name)}}" class="link-product" ><img src="{{route('image',$item->image)}}" alt=""></a>
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
            {{-- <link rel="stylesheet" href="{{URL::asset('/source/css/panigator.css')}}">
            {!! $products->links() !!} --}}
            <script>
                $("#search-keyup").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $(".card__title").filter(function() {
                        $(this).parent().parent().toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
            </script>
        @else
            <div class="txt-center text c-red">Không có sản phẩm bạn cần tìm...</div>
        @endif
    </section>
@endsection
