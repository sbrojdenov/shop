@extends('layouts.admin')
@section('content')

<!-- /#sidebar-wrapper -->

<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
         @include('template.lang') 
        <div class="row">
            <div class="col-lg-12">
                <form action="{{URL::asset(LaravelLocalization::setLocale().DIRECTORY_SEPARATOR.'admin-slaider-edit/'.$slaider->id)}}" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="usr">Име: </label>                 
                        <input name="name" value="{{$slaider->name}}" type="text" class="form-control" id="usr">
                    </div>
                    
                     <div class="form-group">
                        <label for="usr">Oписание: </label>
                        <textarea name='description'  class="form-control" rows="5" id="comment">{{$slaider->description}}</textarea>
                    </div>

             
                     @if (isset($slaider->image_url))
                    <div class="form-group">
                        <label for="comment"><img src="{{URL::asset('admin/slaider/'.$slaider->image_url)}}" width="50px" height="50px"/> Картинка:</label>
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

