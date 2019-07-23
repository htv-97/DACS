@extends('master')
@section('content')
    <div class="header-archive">
        <h1 class="title">{{$productType}}</h1>
        <div class="flex--between-center w-95 border--bottom px-1">
            <div class="redirect-trees">
                <a href="{{route('index-page')}}">Trang chủ</a>
                <a href="#">{{$productType}}</a>
            </div>
            <input type="text" name="" id="search-keyup" placeholder="Tìm theo tên sản phẩm...">
        </div>                
    </div>        
    <section class="grid__products-list">
        @foreach ($productList as $item)


            <article class="card card__product">
                @if(!empty($item->promotion_price))
                    <span class="sales">{{100 - round($item->promotion_price / $item->unit_price * 100).'%'}}</span>
                @endif
                <a href="{{route('productDetail',$item->name)}}">
                    <img src="{{route('image',$item->image)}}" alt=""></a>
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
                </a>

            </article>
        @endforeach
                                                            
    </section>
    {!! $productList->links() !!}
    <script>
         $("#search-keyup").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $(".card__title").filter(function() {
                $(this).parent().parent().toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    </script>


@endsection
