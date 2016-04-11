@extends('layouts.app')
@section('content')
<div class="container">
    <div class = "row">
        <div class="col-lg-12 alert alert-info">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <p class="info-box"><strong>При закупуване на повече от един артикул получавате по 1 лев отстъпка за всеки следващ.<br>
                    Пример: При закупуването на 3 артикула получавате 2 лв отстъпка</strong></p>  
        </div>
        <div class = "col-md-7">
            <img id="change" class="img-responsive" src="{{url("admin/product/600x500_".$product->image_url)}}" alt="Chania">
            <table>
                <td class="clicked-image" data-rel="{{url("admin/product/600x500_".$product->image_url)}}"><img src="{{url("admin/product/600x500_".$product->image_url)}}" width="70px" height="70px"/></td>
                <td class="clicked-image" data-rel="{{url("img/cc.png")}}"><img class="change" src="{{url("img/cc.png")}}" width="70px" height="70px"/></td>
                <td class="clicked-image" data-rel="{{url("admin/product/600x500_".$product->image_url)}}"><img  src="{{url("admin/product/600x500_".$product->image_url)}}" width="70px" height="70px"/></td>
                <td class="clicked-image" data-rel="{{url("admin/product/600x500_".$product->image_url)}}"><img  src="{{url("admin/product/600x500_".$product->image_url)}}" width="70px" height="70px"/></td>
                <td class="clicked-image"><img  src="{{url("admin/product/600x500_".$product->image_url)}}" width="70px" height="70px"/></td>
                <td class="clicked-image"><img  src="{{url("admin/product/600x500_".$product->image_url)}}"width="70px" height="70px"/></td>
                <td class="clicked-image"><img  src="{{url("admin/product/600x500_".$product->image_url)}}" width="70px" height="70px"/></td>
                <td class="clicked-image"><img  src="{{url("admin/product/600x500_".$product->image_url)}}" width="70px" height="70px"/></td>
                <tr/>
                <td class="clicked-image"><img  src="{{url("admin/product/600x500_".$product->image_url)}}" width="70px" height="70px"/></td>
                <td class="clicked-image"><img  src="{{url("admin/product/600x500_".$product->image_url)}}" width="70px" height="70px"/></td>
                <td class="clicked-image"><img  src="{{url("admin/product/600x500_".$product->image_url)}}" width="70px" height="70px"/></td>
                <td class="clicked-image"><img  src="{{url("admin/product/600x500_".$product->image_url)}}" width="70px" height="70px"/></td>
                <td class="clicked-image"><img  src="{{url("admin/product/600x500_".$product->image_url)}}" width="70px" height="70px"/></td>
                <td class="clicked-image"><img  src="{{url("admin/product/600x500_".$product->image_url)}}" width="70px" height="70px"/></td>
            </table>
        </div>
        <div class = "col-md-5">
            <div class="fb-like" data-href="{{Request::url()}}" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
            <div class="panel panel-default">
                <div class="panel-body">
                    <a href="#"><h3>{{$product->title}}</h3> </a>
                    <h3 class="price">@if (isset($promotion)) <span style='color:red;text-decoration:line-through'>{{$product->price}}</span> {{$product->price-$promotion}} @else {{$product->price}}@endif {{ trans('messages.curency') }}</h3>
                    <a href = "{{url($_lang.DIRECTORY_SEPARATOR."order/detail/".$product->slug)}}" class = "btn btn-primary pull-right" role = "button" >
                        <span class="glyphicon glyphicon-shopping-cart"> </span> {{ trans('messages.buy') }}
                    </a>

                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">{{ trans('messages.fast') }}</div>
                <div class="panel-body">
                    <form action="{{url($_lang.DIRECTORY_SEPARATOR."product-fast")}}" method="post">

                        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                            {!! csrf_field() !!}
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="{{ trans('messages.name') }}">
                            @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                            @endif  
                            <input id='product' type="hidden" name="product" value="{{$product->id}}">
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

                        <button type="submit" class="btn btn-primary btn-block"><strong>{{ trans('messages.now') }}</strong></button> 
                    </form>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Уловия за Доставка</div>
                <div class="panel-body">
                    <p>
                        За София доставката е в рамките на 24 часа 
                        За останалата част от страната от 2 до 5 работни дни
                        Доставката се поема от Купувача
                        Доставките се осъществяват от ф-ма Еконт <img src='{{url('img/econt.png')}}' width='100px' height='50px'/>
                    <p/>
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
