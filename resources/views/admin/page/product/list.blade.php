@extends('admin.master')
@section('content')
<div class="alert" id="alert"></div>
{{-- <input type="text" name="" id="search-keyup" placeholder="Tìm theo tên sản phẩm..."> --}}
<div class="data-table">
    <div class="value value-name ">
        <div><h2>Tên sản phẩm</h2></div>
        <div><h2>Hình ảnh</h2></div>
        <div><h2>Loại sản phẩm</h2></div>
        <div><h2>Giá bán</h2></div>
        <div><h2>Giá khuyến mãi</h2></div>
        <div><h2>Sửa</h2></div>
        <div><h2>Xóa</h2></div>
    </div>
    @foreach ($list as $item)
        <form class="value" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$item->id}}">
            {{-- <input type="text" value="{{$item->name}}" ajax-id='{{$item->id}}' ajax-edit='name'> --}}
            <input type="text" value="{{$item->name}}" name="name">
            <div class="img-wrapper img-file">
                <img src="{{route('image',$item->image)}}" class="thumbails" alt="">
                <input type="file" name="image">
            </div>
            <select name="type" >
                <option value="">Áo</option>
                <option value="">Quần</option>
                <option value="">Váy</option>
                <option value="">Đầm</option>
            </select>
            <div>
                <div class="product__quantity minus" data-type='-1'>-</div>
                <input type="number"  name="unit-price" min="0" value="{{$item->unit_price}}" class="product__quantity">
                <div class="product__quantity plus" data-type='1'>+</div>
            </div>
            <div>
                <div class="product__quantity minus" data-type='-1'>-</div>
                {{-- <input type="number" data-id='{!!$product['item']->id!!}' data-price='{!!$product['priceItem']!!}' name="product-quantity" min="0" value="{{$product['qty']}}" class="product__quantity"> --}}
                <input type="number"  name="promotion" min="0" value="{{$item->promotion_price}}" class="product__quantity">
                <div class="product__quantity plus" data-type='1'>+</div>
            </div>
            <button type="submit" class="status status-pending">Sửa</button>
            <div class="status status-pending" ajax-action='delete' data-id='{{$item->id}}'>Xóa</div>
        </form>  
    @endforeach
    <link rel="stylesheet" href="{{URL::asset('/source/css/panigator.css')}}">

    {!! $list->links() !!}




</div>

       <script>
            $(document).ready(function(){
                // $("#search-keyup").on("keyup", function() {
                //     var value = $(this).val().toLowerCase();
                //     $(".card__title").filter(function() {
                //         $(this).parent().parent().toggle($(this).text().toLowerCase().indexOf(value) > -1)
                //     });
                // });
                $('[ajax-action="delete"]').on('click',function(){
                    $wrapper = $('form').has($(this));
                    $id = $(this).attr('data-id');
                    $wrapper.slideUp(200);
                    setTimeout(() => {
                        $wrapper.remove();
                    }, 210);
                    $.ajax({
                        type: "get",
                        url: `{{route('delType')}}`,
                        data: {'id':$id},
                        dataType: "Json",
                        success: function (res) {
                            alert(res.mess);
                        }
                    });
                })
                
                $(`form.value`).on('submit',function(e){
                    e.preventDefault();
                    $btn = $(this).find(`[type='submit']`);
                    $img = $(this).find('img');
                    $.ajax({
                        type: "POST",
                        url: `{{route('editType')}}`,
                        data: new FormData(this),
                        dataType: 'json',
                        contentType:false,
                        cache:false,
                        processData:false,
                        success: function (res) {
                            if(res.type === 'error'){
                                alert(res.mess);
                            }
                            else{
                                $btn.toggleClass('status-pending status-success');
                                $img.attr('src',`{{URL::asset('source/image/product')}}/`+res.newImg);

                            }
                        }
                    });
                })
               
           })
       </script>
@endsection