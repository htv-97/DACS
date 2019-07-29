@extends('admin.master')
@section('content')
<div class="alert" id="alert"></div>
<div class="data-table">
    <div class="value value-name ">
        <div><h2>Loại</h2></div>
        <div><h2>Hình ảnh</h2></div>
        <div><h2>Thêm</h2></div>
    </div>
    <form class="value" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" placeholder="Thêm loại mới vào đây!!">
        <div class="img-wrapper img-file">
            <img src="{{route('image','default.jpg')}}" class="thumbails" alt="">
            <input type="file" name="image">
        </div>
        <button type="submit" class="status status-pending">Thêm</button>
    </form>  






</div>
       <script>
            $(document).ready(function(){

                
                $(`form.value`).on('submit',function(e){
                    e.preventDefault();
                    $btn = $(this).find(`input[name="name"]`);
                    $.ajax({
                        type: "POST",
                        url: `{{route('createType')}}`,
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
                               alert(res.mess);
                                $btn.val(''); 
                            }
                        }
                    });
                })
               
           })
       </script>
@endsection