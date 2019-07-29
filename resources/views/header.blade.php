<header>
    <a href="{{route('index-page')}}"><img src="{{URL::asset('./source/image/logo/logo-lana.png')}}" alt="" class="logo__header">
    <ul>

        @foreach ($loai_sp as $item)
            <li><a href="{{route('productType',$item->name)}}" class='nav__link'>{{$item->name}}</a></li>
        @endforeach        

    </ul>
</header>