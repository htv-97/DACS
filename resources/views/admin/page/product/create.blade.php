@extends('admin.master')
@section('content')
<div class="alert hidden txt-center" id="alert"></div>
{{-- <input type="text" name="" id="search-keyup" placeholder="Tìm theo tên sản phẩm..."> --}}
<form action="{{route('editProduct')}}" class="product-single" method="Post">
    @csrf
    <div class="product">
        <div class="product_img img-file">
            <p class="hidden alert-error" name='image'></p>
            <img src="{{route('image','default.jpg')}}" class="thumbails" alt="">
            <input type="file" name="image">
        </div>

        <div class="product_detail">
            <p class="hidden alert-error" name='name'></p>
            <label class="">
                <span>Tên: </span>
                <input type="text" name="name"   placeholder="Điền tên sản phẩm ...">
            </label>
            <p class="hidden alert-error" name='unit_price'></p>
            <label>
                <span>Giá: </span>
                <div class="quantity">
                    <input type="number" name="unit_price" min='0' step="1000" value="0" >
                </div>
            </label>
            <p class="hidden alert-error" name='promotion_price'></p>
            <label>
                <span class="title">Giá sale: </span>
                <div class="quantity">
                    <input type="number" name="promotion_price" step='1000' min="0" value="0" >
                </div>
            </label>
            <p class="hidden alert-error" name='id_type'></p>
            <label>
                <span class="title">Loại sản phẩm: </span>
                <select name="id_type" class="selectStyle">
                    <option value="">--- Chọn ---</option>
                    @forelse ($productType as $type)
                        <option value="{{$type->id}}">{{$type->name}}</option>
                    @empty
                        <option value="" selected>Vui lòng thêm loại sản phẩm</option>
                    @endforelse
                </select>
            </label>

        
        
        </div>
    </div>
    <div class="product-description">
        <h2 class="title">Mô tả sản phẩm</h2>
        <p class="hidden alert-error" name='description'></p>
        <textarea name="description"  style="width:100%;" rows="10" placeholder="Mô tả sản phẩm..."></textarea>
    </div>
    <input type="submit" class='right' value="submit">
</form>
<script>
  $(document).ready(function(e){
    $(document).on('submit','form',function(e){
        e.preventDefault();
        var $this = $(this);
        $('.alert-error').addClass('hidden');
        $action = $this.attr('action');
        $formPost = $this.serialize();
        $formData = new FormData(this);
        $.ajax({
            type: "post",
            url: $action,
            data: $formData,
            dataType: "json",
            cache:false,
            contentType:false,
            processData:false        
        })
        .done(function(data){
            link = `{{URL::asset('source/image/product')}}/`;
            $('#alert').removeClass('hidden alert-error').addClass('alert-success');
            $('#alert').empty().append('Đã lưu');
            $this.find('img').attr('src',link+data.product.image);
        })
        .fail(function(mess){
            $.each(mess.responseJSON.errors, function (i, val) {
                $.each($('.alert-error'), function (index, value) { 
                    
                    if(i === value.getAttribute('name')){
                        value.classList.remove('hidden');
                        value.innerHTML = val;
                     }
                });
              
                 
            });
        });
    })
  })
</script>
@endsection