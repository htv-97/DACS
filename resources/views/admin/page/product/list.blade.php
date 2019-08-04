@extends('admin.master')
@section('content')
<div class="alert" id="alert"></div>
{{-- <input type="text" name="" id="search-keyup" placeholder="Tìm theo tên sản phẩm..."> --}}
<ul class="nav-menu">
    @foreach ($productType as $type)
        @if($type->id === $currentType)
            <li class="nav-item active"><p class="nav-link" data-id='{{$type->id}}'>{{$type->name}}</p></li>
        @else
            <li class="nav-item"><p class="nav-link" data-id='{{$type->id}}'>{{$type->name}}</p></li>
        @endif
    @endforeach
        <li class="nav-item"><p class="nav-link" style="width:30px;height:100%"></p></li>

</ul>
<div class="data-table">
    <div class="value value-name ">
        <div><h2>Tên sản phẩm</h2></div>
        <div><h2>Hình ảnh</h2></div>
        <div><h2>Loại sản phẩm</h2></div>
        <div><h2>Giá bán</h2></div>
        <div><h2>Giá khuyến mãi</h2></div>
        <a href="{{route('newProduct')}}" class="icon-plus status status-success"></a>
    </div>
    <div class="data-content">
        @foreach ($list as $item)
            <div class="value">
                <h3>{{$item->name}}</h3>
                <div class="img-wrapper">
                    <img src="{{route('image',$item->image)}}" class="thumbails" alt="">
                    {{-- <input type="file" name="image"> --}}
                </div>
                @foreach ($productType as $type)
                    @if($type->id === $item->id_type)
                        <h3>{{$type->name}}</h3>
                    @endif
                @endforeach
                <h3 class="price">{{$item->unit_price}}</h3>
                @if($item->promotion_price !== null || $item->promotion_price != 0 )
                <h3 class="price">{{$item->promotion_price}}</h3>
                @else
                <p>Không khuyến mãi</p>
                @endif
                <div>
                    <a href="{{route('detailProduct',$item->id)}}" class="status status-pending">Sửa</a>
                    <a class="status status-pending" ajax-action='delete' data-id='{{$item->id}}'>Xóa</a>
                </div>
            </div>  
        @endforeach
    </div>
    {{-- <link rel="stylesheet" href="{{URL::asset('/source/css/panigator.css')}}">

    {!! $list->links() !!} --}}

    

</div>
<script>
    $('document').ready(function(){
        // load data follow type
        $('body').on('click',`.nav-item:not(.active)`,function(e){
            var id = $(this).children().attr('data-id');
            var nameType = $(this).children().text();
            console.log(nameType);
            $('.data-content .value').toggle(200);
            $('.data-content').append(`
            <div class="txt-center">
                <img src='{{URL::asset('source/image/loading.gif')}}' style='margin:20px auto; width:100px;'></img>
            </div>            
            `);
            $.ajax({
                type: "get",
                url: `{{route('showProductType')}}`,
                data: {'id':id},
                dataType: "json"            
            })
            .done(function(res){
                $source = `{{URL::asset('source/image/product/')}}/`;
                $('.data-content').empty();
                if(res.list && res.list.length !== 0){
                    $.each(res.list, function (index, val) { 
                        $linkConstruct = "{{route('detailProduct','__construct')}}";
                        $link = $linkConstruct.replace('__construct',val.id);
                        $('.data-content').append(`<div class="value">
                                    <h3>${val.name}</h3>
                                    <div class="img-wrapper">
                                        <img src="${$source}${val.image}" class="thumbails" alt="">
                                    </div>
                                    <h3>${res.type.name}</h3>
                                    <h3 class="price">${val.unit_price}</h3>
                                        ${$promotion = val.promotion_price 
                                            ? `<h3 class="price">${val.promotion_price}</h3>`
                                            : `<p>Không khuyến mãi</p>`}
                                    <div>
                                        <a href='${$link}' class="status status-pending" data-id='${val.id}'>Sửa</a>
                                        <a  class="status status-pending" ajax-action='delete' data-id='${val.id}'>Xóa</a>
                                    </div>
                                </div>`);
                    });
                }
                else
                $('.data-content').append(`<h2 class='alert alert-error txt-center'>Hiện tại loại hàng ${nameType} đang trống!</h2>`);
            })
            .fail(function(res){
                $('.data-content').append(`<h2 class='alert alert-error'>Có lỗi! Vui lòng F5 lại trang</h2>`);
            });

        });
        $('body').on('click',`[ajax-action="delete"]`,function(e){
                    e.stopPropagation();
                    console.log($(this));
                    $wrapper = $('.value').has($(this));
                    $id = $(this).attr('data-id');
                    $wrapper.slideUp(200);
                    setTimeout(() => {
                        $wrapper.remove();
                    }, 210);
                    $.ajax({
                        type: "get",
                        url: `{{route('delProduct')}}`,
                        data: {'id':$id},
                        dataType: "Json",
                        success: function (res) {
                            alert(res.mess);
                        }
                    });
                })
    })
</script>
@endsection