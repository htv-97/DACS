@extends('admin.master')
@section('content')
@if($errors->any())
    <div class="alert alert-error txt-center">
        <h2 class="title">Đăng ký không thành công!</h2>
        <ul>
        @foreach ($errors->all() as $item)
            <li>{{$item}}</li>            
        @endforeach
        </ul>
    </div>
@elseif(Session::has('created'))
    <div class="alert alert-success txt-center">
        <h2>{{Session::get('created')}}</h2>
    </div>
@endif
<div class="data-table">
    <div class="value value-name ">
        <h2>Tên</h2>
        <h2>Giới tính</h2>
        <h2 class="span_2">Email</h2>
        <h2>Mật khẩu</h2>
        <h2>Quyền admin</h2>
        <div role="open-popup" for='popup-create' title='Thêm mới' class="icon-plus status status-success"></div>
    </div>
    @foreach ($users as $item)
        <form class="value" method="Post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$item->id}}">
            <input type="text" name="name" value="{{$item->name}}" required>
            <select name="gender" class="selectStyle">
                <option value="{{$item->gender}}">{{$convert[$item->gender]}}</option>
                <option value="male">Nam</option>
                <option value="female">Nữ</option>
            </select>
            <input type="email" name="email" value="{{$item->email}}" class="span_2">
            <input type="text" name="password" placeholder="Đặt lại mật khẩu">
            <select name="role" class="selectStyle">
                <option value="{{$item->role}}">{{$item->role}}</option>
                <option value="customer">customer</option>
                <option value="admin">admin</option>
            </select>
            <div class="flex-center">
                <button type="submit" class="icon-pencil status status-pending" title="Cập nhật"></button>
                <div class="icon-x status status-pending" ajax-action='delete' data-id='{{$item->id}}' title="Xóa"></div>
            </div>
        </form>  
    @endforeach
    {{-- {!! $productList->links() !!} --}}
<div class="popup" id="popup-create">
    <form class="" method="Post" enctype="multipart/form-data" action="{{route('createAccount')}}">
        <div class="icon-x" role='close-popup' for='popup-create'></div>
        @csrf
        <input type="text" name="name" value="" placeholder='Nhập tên tài khoản*' required>
        <select name="gender">
            <option value="">-- Chọn giới tính* --</option>
            <option value="male">Nam</option>
            <option value="female">Nữ</option>
        </select>
        <input type="email" name="email" placeholder="Nhập email đăng nhập*"  class="span_2">
        <input type="text" name="password" placeholder="Đặt mật khẩu ...">
        <select name="role">
            <option value="">Cấp quyền sử dụng</option>
            <option value="customer">customer</option>
            <option value="admin">admin</option>
        </select>
        <button type="submit" class="btn" title="Cập nhật">GỬI</button>
    </form>
</div>
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
                            url: `{{route('delAccount')}}`,
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
                    $.ajax({
                        type: "POST",
                        url: `{{route('editAccount')}}`,
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
                            }
                        }
                    });
                })
              //  popup show
                $(`body`).on('click',`[role*="popup"]`,function(e){
                    e.stopPropagation();
                    $(`#${$(this).attr('for')}`).toggleClass('active');
                })
             
           })
       </script>
@endsection