<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="apple-touch-icon" sizes="57x57" href="{{URL::asset('source/favicon/apple-icon-57x57.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{URL::asset('source/favicon/favicon-16x16.png')}}">
	<link rel="stylesheet" href="{{URL::asset('/source/css/admin.css')}}">
	{{-- <link rel="stylesheet" href="{{HTML::image('/source/css/admin.css')}}"> --}}
	<link rel="stylesheet" href="{{ URL::asset("source/icomoon/admin/style.css") }}">
	{{-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous"> --}}
	<script src="{{URL::asset('source/js/jquery.min.js')}}"></script>
	<title>Quản trị Lanalala</title>

</head>
<body>
	<div class="body">
        @include('admin.menu')




		<div class="main-contain" id="main">
			@include('admin.header')
			{{-- <div class="nav-view border-bot">
				<div class="nav-folder">
					<div class="box-folder box-folder--current">
						<p>Dashboard<span></span></p>
					</div>
					<div class="box-folder">
						<p>Table<span></span></p>
					</div>
				</div>
			</div> --}}
			<section class="main-content">
				@yield('content')
			</section>
		</div>
		



			
</div>
<script src="{{URL::asset('source/js/admin.js')}}"></script>
</body>
</html>