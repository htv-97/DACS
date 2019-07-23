<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="apple-touch-icon" sizes="57x57" href="{{URL::asset('source/favicon/apple-icon-57x57.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{URL::asset('source/favicon/favicon-16x16.png')}}">
    {{-- <link rel="manifest" href="./source/manifest.json"> --}}
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="{{ URL::asset("source/icomoon/style.css") }}">
    <link rel="stylesheet" href="{{ URL::asset("source/css/owl.carousel.css")}}">
    <link rel="stylesheet" href="{{ URL::asset("source/css/grid.css")}}">
    <script src="{{URL::asset('source/js/jquery-3.4.1.min.js')}}"></script>
    {{-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js">     --}}
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

</body>

</html>