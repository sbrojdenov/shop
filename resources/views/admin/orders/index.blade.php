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
                            <th>Еmail</th>
                            <th>Град</th>
                            <th>Количество</th>
                        </tr>
                    </thead>

                    <tbody>
                        
                         @foreach ($orders as $order )
                        <tr>
                            <td class="hidden-phone">{{$order->category}}</td>
                            <td class="hidden-phone">{{$order->product_title}}</td>
                            <td class="hidden-phone">{{$order->user_name}}</td>
                            <td class="hidden-phone">{{$order->telephone}}</td>
                            <td class="hidden-phone">{{$order->email}}</td>
                            <td class="hidden-phone">{{$order->town}}</td>
                            <td class="hidden-phone">{{$order->quantity}}</td>
                            <td><a class="btn mini blue-stripe" href="admin-order-edit/{{$order->id}}">Редактиране</a></td>
                            <td><a href="admin-order_delete/{{$order->id}}" class="confirm-delete btn mini red-stripe" role="button" data-title="johnny" data-id="1">Изстриване</a></td>
                        </tr>
                          @endforeach
                    </tbody>

                </table>
                 {!! $orders->links() !!}
            </div>
        </div>
    </div>
</div>
<!-- /#page-content-wrapper -->

</div>

@endsection

