<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="apple-touch-icon" sizes="57x57" href="{{URL::asset('source/favicon/apple-icon-57x57.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{URL::asset('source/favicon/favicon-16x16.png')}}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="{{ URL::asset("source/icomoon/customer/style.css") }}">
    <link rel="stylesheet" href="{{ URL::asset("source/css/owl.carousel.css")}}">
    <link rel="stylesheet" href="{{ URL::asset("source/css/grid.css")}}">
    <script src="{{URL::asset('source/js/jquery.min.js')}}"></script>
    <title>LANALALA</title>
</head>
<body>
    <div class="grid__body container__main">
        @include('header')
        <main>
            
            @yield('content')
            @include('footer')
        </main>
        @include('rightSide')
    </div>
    
<script src="{{URL::asset('source/js/owl.carousel.js')}}"></script>
<script src="{{URL::asset('source/js/main.js')}}"></script>
@if(session()->has('jsAlert'))
    <script>
        alert({{ session()->get('jsAlert') }});
    </script>
@endif 

</body>
<script>
  
    $(document).ready(function(){
        if(typeof(Storage) !== null){
            var wishStorage = localStorage.getItem('wishlist');
            $('[data-wishlist]').each(function (index, element) {
                var id = $(this).attr('data-id');
                if(wishStorage.indexOf(id) > -1)
                    $(this).addClass('active');            
            });
        }
        else alert('Vui lòng nâng cấp trình duyệt lên phiên bản mới nhất !!!')
    })
</script>
</html>