@extends('master')
@section('content')
    <div class="header-archive container curtain " style="background-image:url('{{route('newsImg',$news->image)}}')">
        <h1 class="title txt-center">{{$newsTitle}}</h1>
    </div>        
    <section >
        <p>{{$news->content}}</p>
                                                            
    </section>
  


@endsection
