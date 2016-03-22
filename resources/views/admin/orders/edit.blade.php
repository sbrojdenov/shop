@extends('layouts.admin')
@section('content')

<!-- /#sidebar-wrapper -->

<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <form>
                       @foreach ($products as $pr )


                    <div class="form-group">
                        <label for="usr">Име на продукта: </label>                 
                        <input name="title" value="{{$pr['title']}}" type="text" class="form-control" disabled id="usr">
                    </div>
                    
                     <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    
                    <div class="form-group">
                        <label for="usr">Код на продукта: </label>                 
                        <input name="title" value="{{$pr['code']}}" type="text" class="form-control" disabled id="usr">
                    </div>
                     
                      <div class="form-group">
                        <label for="usr">Цена на продукта: </label>                 
                        <input name="title" value="{{$pr['price']}}" type="text" class="form-control" disabled id="usr">
                    </div>
                     <hr>
                     @endforeach

                    <div class="form-group">
                        <label for="usr">Имейл: </label>                 
                        <input name="title" value="{{$orders->email}}" type="text" class="form-control" disabled id="usr">
                    </div>
                     @if ($orders->promo>0)
                     <div class="form-group">
                        <label for="usr">Промо цена:</label>                 
                        <input name="title" value="{{$orders->promo}}" type="text" class="form-control" disabled id="usr">
                    </div>
                     @endif

                    <div class="form-group">
                        <label for="usr">Име на клиент:</label>                 
                        <input name="title" value="{{$orders->user_name}}" type="text" class="form-control" disabled id="usr">
                    </div>

                    <div class="form-group">
                        <label for="usr">Телефон:</label>                 
                        <input name="title" value="{{$orders->telephone}}" type="text" class="form-control" disabled id="usr">
                    </div>

                    <div class="form-group">
                        <label for="usr">Количество:</label>                 
                        <input name="title" value="{{$orders->quantity}}" type="text" class="form-control" disabled id="usr">
                    </div>

                    <div class="form-group">
                        <label for="usr">Адрес:</label>                 
                        <input name="title" value="{{$orders->adress}}" type="text" class="form-control" disabled id="usr">
                    </div>

                    <div class="form-group">
                        <label for="usr">Град:</label>                 
                        <input name="title" value="{{$orders->town}}" type="text" class="form-control" disabled id="usr">
                    </div>

                    <div class="form-group">
                        <label for="comment">Коментар:</label>
                        <textarea class="form-control" rows="3" id="comment" disabled>{{$orders->comment}}</textarea>
                    </div>

                </form>

            </div> 
        </div>

    </div>
</div>

@endsection