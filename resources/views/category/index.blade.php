@extends('layouts.app')
@section('content')
<div class="container">
    <div class = "row">
        <div class="col-lg-12">
            <h1 class="page-header">{{$category->title}}</h1>
        </div>
        @if(Session::has('message'))
        <div class="col-lg-12 alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <p><strong>{{Session::get('message')}}</strong></p>  
        </div>
        @endif

        @foreach ($products as $product)
        <div class = "col-sm-6 col-md-3">
            <div class = "thumbnail">
                <a href="{{url($_lang.DIRECTORY_SEPARATOR.'product/'.$product->slug)}}"><img src = "{{url("admin/product/400x300_".$product->image_url)}}" alt = "Generic placeholder thumbnail"></a>
            </div>

            <div class = "caption">
                <a href="{{url($_lang.DIRECTORY_SEPARATOR.'product/'.$product->slug)}}"><h3>{{$product->title}}</h3></a>
                <h3 class="price">{{$product->price}} {{ trans('messages.curency') }}</h3>
                <p>{{$product->summary}}</p>
                <p><strong>Код на продукта: {{$product->code}}</strong></p>
                <p>
                    <a href = "{{url($_lang.DIRECTORY_SEPARATOR."order/store/".$product->slug)}}" class = "btn btn-primary" role = "button">
                        <span class="glyphicon glyphicon-shopping-cart"> </span> {{ trans('messages.buy') }}
                    </a> 
                </p>

            </div>

        </div>
        @endforeach

    </div> 
</div>

@endsection
