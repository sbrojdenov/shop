@extends('layouts.admin')
@section('content')

<!-- /#sidebar-wrapper -->

<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <form>
                    <div class="form-group">
                        <label for="usr">Категория: </label>                 
                        <input name="title" value="{{$orders->category}}" type="text" class="form-control" disabled id="usr">
                    </div>

                    <div class="form-group">
                        <label for="usr">Име на продукта: </label>                 
                        <input name="title" value="{{$orders->product_title}}" type="text" class="form-control" disabled id="usr">
                    </div>
                    
                    <div class="form-group">
                        <label for="usr">Код на продукта: </label>                 
                        <input name="title" value="{{$orders->code}}" type="text" class="form-control" disabled id="usr">
                    </div>

                    <div class="form-group">
                        <label for="usr">Имейл: </label>                 
                        <input name="title" value="{{$orders->email}}" type="text" class="form-control" disabled id="usr">
                    </div>

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