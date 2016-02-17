@extends('layouts.app')
@section('content')
<div class="container">
   <div class = "row">
      <div class = "col-md-12">
         @foreach ($products as $product)
         <div class="panel panel-default">
            <div class="panel-body">
               <ul id="order">
                  <a href="{{url($_lang.DIRECTORY_SEPARATOR."order/delete/".$product['id'])}}" id="myClose" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <li>
                     <div  style="float: left;">
                        <p><span class="order-title">{{$product['name']}}<span>                            
                     </div>
                     <div  style="float: right;margin-right:3%;">
                        <p class="price-el">Цена: {{$product['price']}} {{ trans('messages.curency') }}</p>
                     </div>
                     <!--                            <div  class="form-group" style="float: right;">
                        <select class="form-control">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>                            
                        </div>-->
                     <div style="float: none; clear: both;"></div>
                  </li>
               </ul>
            </div>
         </div>
         @endforeach
      </div>
   </div>
   <div class="panel panel-default">
      <div class="panel-heading"><strong>{{ trans('messages.fast_order') }}</strong></div>
      <div class="panel-body">
         <form role="form" action="{{url("order/save")}}" method="post">     
              {!! csrf_field() !!}
         @if(!isset($authUser))
         <div class="form-group {{ $errors->has('telephone') ? ' has-error' : '' }}">
            <input type="text" name="telephone"  value="{{ old('telephone') }}" class="form-control" id="usr" placeholder="Телефон">
            @if ($errors->has('telephone'))
                <span class="help-block">
                    <strong>{{ $errors->first('telephone') }}</strong>
                </span>
           @endif          
         </div>
         <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
            <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="usr" placeholder="Име и фамиля">
             @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
           @endif  
         </div>
         <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
            <input type="text" name="email" value="{{ old('email') }}" class="form-control" id="usr" placeholder="E-mail">
              @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
           @endif 
         </div>
         <div class="form-group {{ $errors->has('town') ? ' has-error' : '' }}">
            <input type="text" name="town" value="{{ old('town') }}"  class="form-control" id="usr" placeholder="Град">
            @if ($errors->has('town'))
                <span class="help-block">
                    <strong>{{ $errors->first('town') }}</strong>
                </span>
           @endif  
         </div>
         <div class="form-group {{ $errors->has('adress') ? ' has-error' : '' }}">
            <input type="text" name="adress" value="{{ old('adress') }}" class="form-control" id="usr" placeholder="Адрес">
             @if ($errors->has('adress'))
                <span class="help-block">
                    <strong>{{ $errors->first('adress') }}</strong>
                </span>
           @endif  
         </div>
         @endif
         <div class="form-group">
            <textarea class="form-control" name="comment" placeholder="Коментар към поръчката" rows="3" id="comment">{{ old('comment') }}</textarea>
         </div>
      </div>
      <button type="submit" class="btn btn-primary btn-block"><strong>{{ trans('messages.now') }}</strong></button> 
      </form>
          
    

   </div>
</div>
</div>
</div>
@endsection