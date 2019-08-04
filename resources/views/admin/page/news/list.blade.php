@extends('admin.master')
@section('content')
<div class="alert" id="alert"></div>
<div class="data-table">
    <div class="value value-name ">
        <h2>Tiêu để</h2>
        <h2>Hình ảnh</h2>
        <h2 class="span_2">Nội dung</h2>
        <span ajax-action='create' title='Thêm mới' class="icon-plus status status-success"></span>
    </div>
    @foreach ($news as $item)
        <form class="value" method="Post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$item->id}}">
            <input type="text" name="title" value="{{$item->title}}" required>
            <div class="img-wrapper img-file">
                <img src="{{route('newsImg',$item->image)}}" class="thumbails" alt="">
                <input type="file" name="image">
            </div>
            <textarea class='span_2' name="content" id="" cols="30" rows="5">{{$item->content}}</textarea>
            <div class="flex-center">
                <button type="submit" class="icon-pencil status status-pending" title="Cập nhật"></button>
                <div class="icon-x status status-pending" ajax-action='delete' data-id='{{$item->id}}' title="Xóa"></div>
            </div>
        </form>  
    @endforeach
    {{-- {!! $productList->links() !!} --}}

</div>
       <script>
            $(document).ready(function(){
                
                $('body').on('click',`[ajax-action="delete"]`,function(){
                    var reconfirm = confirm('Bạn có thực sự muốn xóa!');
                    if(reconfirm){
                        $wrapper = $('form').has($(this));
                        $id = $(this).attr('data-id');
                        $wrapper.slideUp(200);
                        setTimeout(() => {
                            $wrapper.remove();
                        }, 210);
                        $.ajax({
                            type: "get",
                            url: `{{route('delNews')}}`,
                            data: {'id':$id},
                            dataType: "Json",
                            success: function (res) {
                                alert(res.mess);
                            }
                        });
                    }
                })
                
                $(`body`).on('submit',`form.value`,function(e){
                    e.preventDefault();
                    $btn = $(this).find(`[type='submit']`);
                    $img = $(this).find('img');
                    $.ajax({
                        type: "POST",
                        url: `{{route('editNews')}}`,
                        data: new FormData(this),
                        dataType: 'json',
                        contentType:false,
                        cache:false,
                        processData:false,
                        success: function (res) {
                            if(res.type === 'errors'){
                                alert(res.mess);
                            }
                            else{
                                $btn.toggleClass('status-pending status-success');
                                $img.attr('src',`{{URL::asset('source/image/news/${res.mess.image}')}}`);

                            }
                        }
                    });
                })
                $('body').on('click',`[ajax-action='create']`,function(){
                    $id = $('.data-table .value.value-name').next().find('input[name="id"]').val();
                    $id++;
                    $content = `<form class="value" method="Post" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="${$id}">
                                    <input type="text" name="title" required placeholder='Nhập tiêu đề...'>
                                    <div class="img-wrapper img-file">
                                        <img src="{{route('image','default.jpg')}}" class="thumbails" alt="">
                                        <input type="file" name="image">
                                    </div>
                                    <textarea class='span_2' name="content" id="" cols="30"> Nhập lại nội dung tin...</textarea>
                                    <div class="flex-center">
                                        <button type="submit" class="icon-pencil status status-pending" title="Cập nhật"></button>
                                        <div class="icon-x status status-pending" ajax-action='delete' data-id='${$id}' title="Xóa"></div>
                                    </div>
                                </form>`;
                    $('.data-table .value.value-name').after($content);
                })
           })
       </script>
@endsection