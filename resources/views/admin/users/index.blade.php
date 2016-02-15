@extends('layouts.admin')
@section('content')

<!-- /#sidebar-wrapper -->

<!-- Page Content -->
<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">

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

                            <th>Име и фамилия</th>
                            <th>Телефон</th>
                            <th>Е-mail</th>
                            <th>Град</th>
                            <th>Адрес</th>
                          
                        </tr>
                    </thead>

                    <tbody>
                         @foreach ($users as $user )
                        <tr>
                            <td class="hidden-phone">{{$user->name}}</td>
                            <td class="hidden-phone">{{$user->telephone}}</td>
                            <td class="hidden-phone">{{$user->email}}</td>
                            <td class="hidden-phone">{{$user->town}}</td>
                            <td class="hidden-phone">{{$user->adress}}</td> 
                        </tr>
                        @endforeach

                    </tbody>

                </table>
                {!! $users->links() !!}
            </div>
        </div>
    </div>
</div>
<!-- /#page-content-wrapper -->

</div>

@endsection

