<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="apple-touch-icon" sizes="57x57" href="./source/favicon/apple-icon-57x57.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./source/favicon/favicon-16x16.png">
    <link rel="manifest" href="./source/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="./source/icomoon/style.css">
    <link rel="stylesheet" href="./source/css/owl.carousel.css">
    <link rel="stylesheet" href="./source/css/grid.css">
    <script src="./source/js/jquery-3.4.1.min.js"></script>    
    <title>grid</title>
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
    
<script src="./source/js/owl.carousel.js"></script>
<script src="./source/js/main.js"></script>

</body>

</html>