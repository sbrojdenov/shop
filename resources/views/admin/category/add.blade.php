@extends('layouts.admin')
@section('content')

<!-- /#sidebar-wrapper -->

<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
         @include('template.lang') 
        <div class="row">
            <div class="col-lg-12">
                <form action="{{URL::asset(LaravelLocalization::setLocale().DIRECTORY_SEPARATOR.'admin-category-add')}}" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="usr">Заглавие: </label>
                        <input name="title" type="text" class="form-control" id="usr">
                    </div>
                    
                     <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <label for="sel1">Избери категория:</label>
                        <select class="form-control" id="sel1" name="main_category">
                            <option value="1">Главна</option>
                            <option value="2">Допълнителна</option>
                            <option value="3">Главна и допълнителна</option>
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