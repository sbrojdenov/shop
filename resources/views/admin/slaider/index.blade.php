@extends('layouts.admin')
@section('content')

<!-- /#sidebar-wrapper -->

<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
         @include('template.lang') 
        <div class="row">
            <div class="col-lg-3">
                 <a href="{{URL::asset('admin-slaider-add')}}" class="btn btn-default">Добави</a>
            </div>
            <div class="col-lg-12">
                <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <h3 id="myModalLabel">Delete</h3>
                    </div>
                    <div class="modal-body">
                        <p></p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                        <button data-dismiss="modal" class="btn red" id="btnYes">Confirm</button>
                    </div>
                </div><table class="table table-striped table-hover table-users">
                    <thead>
                        <tr>

                            <th>Заглавие</th>
                        
                        </tr>
                    </thead>

                    <tbody>
                     @foreach ($slaider as $slaid )
                        <tr>
                            <td class="hidden-phone">{{$slaid->name}}</td>                 
                            <td><a class="btn mini blue-stripe" href="admin-slaider-edit/{{$slaid->id}}">Редактиране</a></td>
                            <td><a href="admin-slaider_delete/{{$slaid->id}}" class="confirm-delete btn mini red-stripe" role="button" data-title="johnny" data-id="1">Изтриване</a></td>
                        </tr>
                      @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>
<!-- /#page-content-wrapper -->

</div>

@endsection

