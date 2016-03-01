@extends('layouts.app')
@section('content')
<div class="container upper">
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
                <p><strong>{{ trans('messages.code') }}: {{$product->code}}</strong></p>
                <p>
                    <a href = "{{url($_lang.DIRECTORY_SEPARATOR."order/store/".$product->slug)}}" class = "btn btn-primary" role = "button">
                        <span class="glyphicon glyphicon-shopping-cart"> </span> {{ trans('messages.buy') }}
                    </a> 
                <p>
                    <a  data-price="{{$product->price}}" data-product="{{$product->id}}"  onclick="goDoSomething(this)"  class = "btn btn-primary my-button" role = "button">
                        <span class="glyphicon glyphicon-time"> </span> {{ trans('messages.fast') }}
                    </a> 
                </p>
                </p>

            </div>

        </div>
        @endforeach

    </div> 
</div>

<div id="element_to_pop_up" @if (session('status')) class='visib' @endif style="width: 350px;height: auto;" >

    <div class="panel panel-default">
        <span class="button b-close"><span>X</span></span>
        <div class="panel-heading"> 
            <span class="glyphicon glyphicon-time order-fast"> </span> <span class="order-fast">{{ trans('messages.fast') }}</span>
            <p><a href="#">{{ trans('messages.info') }}</a></p>
        </div>
        <div class="panel-body">
            <form action="{{url($_lang.DIRECTORY_SEPARATOR."ordera/fast")}}" method="post">
               
                <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                    {!! csrf_field() !!}
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="{{ trans('messages.name') }}">
                    @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif  
                    <input id='product' type="hidden" name="product" value="">
                </div>
                <div class="form-group {{ $errors->has('telephone') ? ' has-error' : '' }}">

                    <input type="text" name="telephone"  value="{{ old('telephone') }}" class="form-control" id="usr" placeholder="{{ trans('messages.telephone') }}"> 
                    @if ($errors->has('telephone'))
                    <span class="help-block">
                        <strong>{{ $errors->first('telephone') }}</strong>
                    </span>
                    @endif   

                </div>
                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                    <input type="text" name="email" value="{{ old('email') }}" class="form-control"  placeholder="E-mail">
                    @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif 
                </div>

                <div class="form-group {{ $errors->has('town') ? ' has-error' : '' }}">
                    <input type="text" name="town" value="{{ old('town') }}"  class="form-control"  placeholder="{{ trans('messages.town') }}">
                    @if ($errors->has('town'))
                    <span class="help-block">
                        <strong>{{ $errors->first('town') }}</strong>
                    </span>
                    @endif  
                </div>

                <div class="form-group {{ $errors->has('adress') ? ' has-error' : '' }}">
                    <input type="text" name="adress" value="{{ old('adress') }}" class="form-control"  placeholder="{{ trans('messages.adress') }}">
                    @if ($errors->has('adress'))
                    <span class="help-block">
                        <strong>{{ $errors->first('adress') }}</strong>
                    </span>
                    @endif  
                </div>

                <div class="form-group">
                    <input type="text" name="comment" placeholder="{{ trans('messages.comment') }}" value="{{ old('comment') }}" class="form-control" >
                </div>
                <div class="total form-group">
                    <span>{{ trans('messages.sum') }}: <span id='tt'></span> {{ trans('messages.curency') }}</span>
                </div>
                <button type="submit" class="btn btn-primary btn-block"><strong>{{ trans('messages.now') }}</strong></button> 
            </form>
        </div>
    </div>
</div>

@endsection
