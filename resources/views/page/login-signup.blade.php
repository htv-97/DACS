@extends('master')
@section('content')
<link rel="stylesheet" href="./source/css/signup-login.css">
    
    <section class="user">
        <div class="user_options-container">
        <div class="user_options-text">
            <div class="user_options-unregistered">
            <h2 class="user_unregistered-title">Bạn chưa có tài khoản?</h2>
            <p class="user_unregistered-text">Nhấn nút phía dưới để tạo tài khoản</p>
            <button class="user_unregistered-signup" id="signup-button">Đăng ký</button>
            </div>
    
            <div class="user_options-registered">
            <h2 class="user_registered-title">Bạn đã có tài khoản??</h2>
            <p class="user_registered-text">Nhấn nút dưới để đăng nhập</p>
            <button class="user_registered-login" id="login-button">Đăng nhập</button>
            </div>
        </div>
        
        <div class="user_options-forms" id="user_options-forms">
            <div class="user_forms-login">
            <h2 class="forms_title">Đăng nhập</h2>
            <form class="forms_form">
                <fieldset class="forms_fieldset">
                <div class="forms_field">
                    <input type="email" placeholder="Email" class="forms_field-input" required autofocus />
                </div>
                <div class="forms_field">
                    <input type="password" placeholder="Mật khẩu" class="forms_field-input" required />
                </div>
                </fieldset>
                <div class="forms_buttons">
                <button type="button" class="forms_buttons-forgot">Quên mật khẩu</button>
                <input type="submit" value="Đăng nhập" class="forms_buttons-action">
                </div>
            </form>
            </div>
            <div class="user_forms-signup">
            <h2 class="forms_title">Đăng ký</h2>
            <form class="forms_form">
                <fieldset class="forms_fieldset">
                <div class="forms_field">
                    <input type="text" placeholder="Họ và tên" class="forms_field-input" required />
                </div>
                <div class="forms_field">
                    <input type="email" placeholder="Email" class="forms_field-input" required />
                </div>
                <div class="forms_field">
                    <input type="password" placeholder="Mật khẩu" class="forms_field-input" required />
                </div>
                </fieldset>
                <div class="forms_buttons">
                <input type="submit" value="Đăng ký" class="forms_buttons-action">
                </div>
            </form>
            </div>
        </div>
        </div>
    </section>
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