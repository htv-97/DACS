@extends('master')
@section('content')
<link rel="stylesheet" href="{{URL::asset('source/css/signup-login.css')}}">
    <section>
        @if(Session::has('signupAlert'))
        <div class="alert bg-success flex-center txt-center">
            <strong>{{Session::get('signupAlert')}}</strong>
        </div>
        @elseif($errors->any())
          <div class="alert bg-error flex-center txt-center">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="size-14 c-red">{{ $error }}</li>
                        
                    @endforeach
                </ul>
            </div>
        @elseif(Session::has('errorAdminLogin'))
            <h3 class="alert bg-error flex-center txt-center">{{Session::get('message')}}</h3>
  
        @endif
        <article class="user">
        
            <div class="user_options-container">
                <div class="user_options-text">
                    <div class="user_options-unregistered">
                        @if(Auth::check())
                            <h2 class="user_unregistered-title">Chào mừng <span class="size-18 c-white upp">{{Auth::user()->name}}</span> đến với Lanalala!!</h2>
                            <p class="user_unregistered-text">Nhấn nút dưới để đăng xuất</p>
                            <a class="user_unregistered-signup" href='{{route('logout')}}'>Đăng xuất</a>
                        @elseif(Session::has('errorLogin'))
                            <h2 class="user_unregistered-title">{{Session::get('message')}}</h2>
                            <p class="user_unregistered-text">Vui lòng nhập lại hoặc đăng ký bên dưới!</p>
                            <button class="user_unregistered-signup" id="signup-button">Đăng ký</button>
                        @else
                            <h2 class="user_unregistered-title">Bạn chưa có tài khoản?</h2>
                            <p class="user_unregistered-text">Nhấn nút phía dưới để tạo tài khoản</p>
                            <button class="user_unregistered-signup" id="signup-button">Đăng ký</button>

                        @endif
                    </div>
            
                    <div class="user_options-registered">
                    <h2 class="user_registered-title">Bạn đã có tài khoản??</h2>
                    <p class="user_registered-text">Nhấn nút dưới để đăng nhập</p>
                    <button class="user_registered-login" id="login-button">Đăng nhập</button>
                    </div>
                </div>
                
                <div class="user_options-forms" id="user_options-forms">
                    <div class="user_forms-login" style="text-align:center">
                        @if(Auth::check())
                            <img src="{{URL::asset('source/image/avatar/tam.jpg')}}"  style='height:300px;width:auto !important;'alt="">
                        @else
                            <h2 class="forms_title">Đăng nhập</h2>
                            <form class="forms_form" method="post" action="{{route('login')}}">
                                @csrf
                                <fieldset class="forms_fieldset">
                                <div class="forms_field">
                                    <input type="email" name="email" placeholder="Email" class="forms_field-input" required autofocus />
                                </div>
                                <div class="forms_field">
                                    <input type="password" name="pass" placeholder="Mật khẩu" class="forms_field-input" required />
                                </div>
                                </fieldset>
                                <div class="forms_buttons">
                                    <button type="button" class="forms_buttons-forgot">Quên mật khẩu</button>
                                    <input type="submit" value="Đăng nhập" class="forms_buttons-action">
                                </div>
                            </form>
                        @endif
                    </div>
                    <div class="user_forms-signup">
                        <h2 class="forms_title">Đăng ký</h2>
                        <form class="forms_form" method="post" action="{{route('signup')}}">
                            @csrf
                            <fieldset class="forms_fieldset">
                            <div class="forms_field">
                                <input type="text" name='username' placeholder="Họ và tên" class="forms_field-input" required />
                            </div>
                            <div class="forms_field">
                                <input type="email" name='email' placeholder="Email" class="forms_field-input" required />
                            </div>
                            <div class="forms_field">
                                <input type="password" name='pass' placeholder="Mật khẩu" class="forms_field-input" required />
                            </div>
                            <div class="forms_field">
                                <label><input type="radio" name="gender" value='male' checked>Nam</label>
                                <label><input type="radio" name="gender" value='female'>Nữ</label>
                            </div>
                
                            </fieldset>
                            <div class="forms_buttons">
                            <input type="submit" value="Đăng ký" class="forms_buttons-action">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </article>
    <script>
    const signupButton = document.getElementById('signup-button'),
    loginButton = document.getElementById('login-button'),
    userForms = document.getElementById('user_options-forms')

    /**
    * Add event listener to the "Sign Up" button
    */
    signupButton.addEventListener('click', () => {
    userForms.classList.remove('bounceRight')
    userForms.classList.add('bounceLeft')
    }, false)

    /**
    * Add event listener to the "Login" button
    */
    loginButton.addEventListener('click', () => {
    userForms.classList.remove('bounceLeft')
    userForms.classList.add('bounceRight')
    }, false)
    </script>
@endsection