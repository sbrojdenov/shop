@extends('layouts.admin')
@section('content')

<!-- /#sidebar-wrapper -->

<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
        @include('template.lang') 
        <div class="row">

            <div class="col-lg-12">
            
                <form action="{{URL::asset(LaravelLocalization::setLocale().DIRECTORY_SEPARATOR.'admin-edit-image')}}" method="post" enctype="multipart/form-data" >
                    <div class="form-group">
                        <label for="comment">Редактиране на картинка <img src="{{URL::asset('admin/product/'.$imageModel->image)}}" width="50px" height="50px"/></label>
                        <input type="file" class="form-control" name="image_url" id="fileToUpload">
                        <input type="hidden" class="form-control" name="id" value="{{$imageModel->id}}">

                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <button type="submit" class="btn btn-default">Редактиране</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /#page-content-wrapper -->

</div>

@endsection


