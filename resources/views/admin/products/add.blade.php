@extends('layouts.admin')
@section('content')

<!-- /#sidebar-wrapper -->

<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
         @include('template.lang') 
        <div class="row">
            <div class="col-lg-12">
                <form action="{{URL::asset(LaravelLocalization::setLocale().DIRECTORY_SEPARATOR.'admin-product-add')}}" method="post" enctype="multipart/form-data">
                    
                    <div class="form-group">
                        <label for="usr">Заглавие: </label>
                        <input name="title" type="text" class="form-control" id="usr">
                    </div>

                    <div class="form-group">
                        <label for="usr">Кратко описание: </label>
                        <textarea name='summary' class="form-control" rows="3" id="comment"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="usr">Описание: </label>
                        <textarea name='description' class="form-control" rows="5" id="comment"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="usr">Цена: </label>
                        <input name="price" type="text" class="form-control" id="usr">
                    </div>

                    <div class="form-group">
                        <label for="usr">Код на продукта: </label>
                        <input name="code" type="text" class="form-control" id="usr">
                    </div>

                    <div class="form-group">
                        <label for="sel1">Категория на продукта:</label>
                        <select class="form-control" id="sel1" name="category">
                           @foreach ($category as $cat )
                            <option value="{{$cat->id}}">{{$cat->title}}</option>
                           @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="comment">Картинка:</label>
                        <input type="file" class="form-control" name="image_url" id="fileToUpload">
                    </div>
                    <button type="submit" class="btn btn-default">Запазване</button>
                </form>
            </div> 
        </div>
    </div>
</div>

@endsection