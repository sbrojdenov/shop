@extends('layouts.app')
@section('content')
<div class="container">
    <div class = "row">
          @if(Session::has('msg'))
        <div class="col-lg-12 alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <p><strong>{{Session::get('msg')}}</strong></p>  
        </div>
        @endif
        <div class = "col-md-7">
            <img class="img-responsive" src="{{url("admin/product/600x500_".$product->image_url)}}" alt="Chania">
        </div>
        <div class = "col-md-5">
            <div class="fb-like" data-href="{{Request::url()}}" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
            <div class="panel panel-default">
                <div class="panel-body">
                    <a href="#"><h3>{{$product->title}}</h3> </a>
                    <h3 class="price ">{{ trans('messages.price') }} : {{$product->price}}</h3>
                    <a href = "{{url($_lang.DIRECTORY_SEPARATOR."order/detail/".$product->slug)}}" class = "btn btn-primary pull-right" role = "button" >
                        <span class="glyphicon glyphicon-shopping-cart"> </span> {{ trans('messages.buy') }}
                    </a>

                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('messages.similar') }}</div>
                <div class="panel-body">
                    <ul class = "list-group">
                          @foreach ($similar as $sm)
                              <li  class = "list-group-item"> <a href=""><img class="img-responsive" src="{{url("admin/product/400x300_".$sm->image_url)}}" width="50px" height="50px" alt=""></a><div class="text-cont"><a href=""> {{$sm->title}}</a></div></li>
                         @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class = "row">
            <div class = "col-md-7">

                <p class="product-paragraph">{{$product->description}}</p>

            </div>
        </div>
    </div>

 
</div>

@endsection
