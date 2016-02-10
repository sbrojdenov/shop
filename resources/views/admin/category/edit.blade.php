@extends('layouts.admin')
@section('content')

<!-- /#sidebar-wrapper -->

<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
         @include('template.lang') 
        <div class="row">
            <div class="col-lg-12">
                <form action="{{URL::asset(LaravelLocalization::setLocale().DIRECTORY_SEPARATOR.'admin-category-edit/'.$category->id)}}" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="usr">Заглавие: </label>                 
                        <input name="title" value="{{$category->title}}" type="text" class="form-control" id="usr">
                    </div>
                     <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="form-group">
                        <label for="sel1">Избери категория:</label>
                        <select class="form-control" id="sel1" name="main_category">
                            <option value="1" @if($category->main_category ==1)  selected  @endif>Главна</option>
                            <option value="2" @if($category->main_category ==2)  selected  @endif>Допълнителна</option>
                            <option value="3" @if($category->main_category ==3)  selected  @endif>Главна и допълнителна</option>
                        </select>
                    </div>
                     @if (isset($category->image_url))
                    <div class="form-group">
                        <label for="comment"><img src="{{URL::asset('admin/category/'.$category->image_url)}}" width="50px" height="50px"/> Картинка:</label>
                        <input type="file" class="form-control" name="image_url" id="fileToUpload">
                    </div>
                    @endif
                    <button type="submit" class="btn btn-default">Редактиране</button>
                </form>

            </div> 
        </div>

    </div>
</div>

@endsection