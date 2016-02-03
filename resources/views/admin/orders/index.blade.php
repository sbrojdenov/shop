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
                            <th>Категория</th>
                            <th>Продукт</th>
                            <th>Име и фамилия</th>
                            <th>Телефон</th>
                            <th>Адрес</th>
                            <th>Град</th>
                        </tr>
                    </thead>

                    <tbody>

                        <tr>
                            <td class="hidden-phone">Кат</td>
                            <td class="hidden-phone">Продукт</td>
                            <td class="hidden-phone">Име и фамилия</td>
                            <td class="hidden-phone">Телефон</td>
                            <td class="hidden-phone">Адрес</td>
                            <td class="hidden-phone">Град</td> 
                            <td><a class="btn mini blue-stripe" href="{site_url()}admin/editFront/1">Edit</a></td>
                            <td><a href="#" class="confirm-delete btn mini red-stripe" role="button" data-title="johnny" data-id="1">Delete</a></td>
                        </tr>
                       

                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>
<!-- /#page-content-wrapper -->

</div>

@endsection

