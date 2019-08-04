@extends('admin.master')
@section('content')
<div class="alert" id="alert"></div>
<div class="data-table">
    <div class="value value-name ">
        <div><h2>Hình ảnh</h2></div>
        <div><h2>Thêm</h2></div>
        <div><h2>Xóa</h2></div>
    </div>
    @foreach ($imgs as $item)
        <form class="value" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$item->id}}">
            <div class="img-wrapper img-file">
                <img src="{{route('slideImg',$item->image)}}" class="thumbails" alt="upload image...">
                <input type="file" name="image">
            </div>
            <div class="status status-success" ajax-action='create' >Thêm</div>
            <div class="status status-pending" ajax-action='delete' data-id='{{$item->id}}'>Xóa</div>
        </form>  
    @endforeach
    {{-- {!! $productList->links() !!} --}}





</div>
       <script>
            $(document).ready(function(){
                


                $('body').on('click',`[ajax-action="delete"]`,function(e){
                    e.stopPropagation();
                    console.log($(this));
                    $wrapper = $('form').has($(this));
                    $id = $(this).attr('data-id');
                    $wrapper.slideUp(200);
                    setTimeout(() => {
                        $wrapper.remove();
                    }, 210);
                    $.ajax({
                        type: "get",
                        url: `{{route('delSlide')}}`,
                        data: {'id':$id},
                        dataType: "Json",
                        success: function (res) {
                        }
                    });
                })

                $('body').on('change',`input[type='file']`,function(e){
                    $('form.value').has($(this)).submit();
                })
                $(`body`).on('submit',"form.value",function(e){
                    e.preventDefault();
                    $img = $(this).find('img');
                    $.ajax({
                        type: "POST",
                        url: `{{route('editSlide')}}`,
                        data: new FormData(this),
                        dataType: 'json',
                        contentType:false,
                        cache:false,
                        processData:false,
                        success: function (res) {
                            if(res.errors || res.type == 'errors'){
                                alert(res.mess);
                            }
                            else{
                                alert('Thêm ảnh thành công!')
                                $img.attr('src',`{{URL::asset('source/image/slide')}}/`+res.mess);
                            }
                        }
                    });
                })
                $('body').on('click',"[ajax-action='create']",function(){
                    var a = $('.data-table .value.value-name').next().find('input[name="id"]').val();
                    a++;
                    console.log(a);
                    $content = `<form class="value" method='post' enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="${a}">
                                    <div class="img-wrapper img-file">
                                        <img src="{{route('image','default.jpg')}}" class="thumbails" alt="Upload image...">
                                        <input type="file" name="image">
                                    </div>
                                    <div class="status status-success" ajax-action='create' >Thêm</div>
                                    <div class="status status-pending" ajax-action='delete' data-id=${a}>Xóa</div>
                                </form>`;
                    $('.data-table .value.value-name').after($content);
                    // $wrapper.slideUp(200);
                    // setTimeout(() => {
                    //     $wrapper.remove();
                    // }, 210);
                })
           })
       </script>
@endsection