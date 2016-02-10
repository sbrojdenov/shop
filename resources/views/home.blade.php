@extends('layouts.app')

@section('content')
<div class="container">
    <div id="myCarousel" class="carousel slide row"> <!-- slider -->
        <div class="carousel-inner">
            @foreach ($slaider as $key=>$slaid )
            <div class="@if($key==0) active @endif item"> <!-- item 1 -->
                <div class="col-md-6">
                    <img src="admin/slaider/{{$slaid->image_url}}" width="450px" height="250px" alt="">
                </div>
                <div class="col-md-6">
                    <h2 class="featurette-heading">{{$slaid->name}}</h2>
                    <p class="lead">{{$slaid->description}}</p>
                </div>
            </div> 
            
           @endforeach

        </div> <!-- end carousel inner -->

    </div> <!-- end slider -->

    <div class="row" id="thumb">

        @foreach ($othercat as $other)
        <div class="col-lg-4 col-md-4 col-xs-6 thumb">
            <a class="thumbnail" href="{{url('category/'.$other->id)}}">
                <img class="img-responsive" src="admin/product/400x300_24259.png"  alt="">
            </a>
        </div>
       @endforeach
    </div>
</div>
@endsection
