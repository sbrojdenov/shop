@extends('layouts.app')

@section('content')
<div class="container">
    <div id="myCarousel" class="carousel slide row"> <!-- slider -->
        <div class="carousel-inner">
            @foreach ($slaider as $key=>$slaid )
            <div class="@if($key==0) active @endif item"> <!-- item 1 -->
                <div class="col-md-6">
                    <a href="#"><img src="{{url("admin/slaider/450x250_".$slaid->image_url)}}"  alt=""></a>
                </div>
                <div class="col-md-6">
                    <a href="#"><h2 class="featurette-heading">{{$slaid->name}}</h2></a>
                    <p class="lead">{{$slaid->description}}</p>
                </div>
            </div> 
            
           @endforeach

        </div> <!-- end carousel inner -->

    </div> <!-- end slider -->

    <div class="row" id="thumb">

        @foreach ($othercat as $other)
        <div class="col-lg-4 col-md-4 col-xs-6 thumb">
            <a class="thumbnail" href="{{url($_lang.DIRECTORY_SEPARATOR.'category/'.$other->slug)}}">
                <img class="img-responsive" src="{{url("admin/category/400x300_".$other->image_url)}}"  alt="">
            </a>
        </div>
       @endforeach
    </div>
</div>
@endsection
