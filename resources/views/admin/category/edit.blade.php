@extends('layouts.admin')
@section('content')

<!-- /#sidebar-wrapper -->

<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <form action="admin-category-add" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="usr">Заглавие: </label>
                        <input name="title" value="{{$category->title}}" type="text" class="form-control" id="usr">
                    </div>

                    <div class="form-group">
                        <label for="sel1">Избери категория:</label>
                        <select class="form-control" id="sel1" name="main_category">
                            <option value="1">Главна</option>
                            <option value="2">Допълнителна</option>
                            <option value="3">Главна и допълнителна</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-default">Редактиране</button>
                </form>
                
                  <div class="form-group">
                        <label for="comment">Картинка:</label>
                        <p><img src="{{$category->image_url}}" width="50px" height="50px"/> <p>
                        <p><a href="">Редактиране</a></p>
                  </div>
            </div> 
        </div>
    </div>
</div>

@endsection