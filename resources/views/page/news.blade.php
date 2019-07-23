@extends('master')
@section('content')
    <div class="header-news container curtain " style="background-image:url('{{route('image',$news->image)}}')">
        <h1 class="title">{{$newsTitle}}</h1>
    </div>        
    <section >
        <p>{{$news->content}}</p>
                                                            
    </section>
  


@endsection
