@extends('admin.master')
@section('content')
<div class="alert" id="alert"></div>
<div class="data-table">
    <div class="value value-name ">
        <div><h2>Loại</h2></div>
        <div><h2>Hình ảnh</h2></div>
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
            <button type="submit" class="status status-pending">Sửa</button>
            <div class="status status-pending" ajax-action='delete' data-id='{{$item->id}}'>Xóa</div>
        </form>  
    @endforeach
    {!! $productList->links() !!}





</div>
       <script>
            $(document).ready(function(){
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