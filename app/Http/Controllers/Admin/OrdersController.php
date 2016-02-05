<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Order;

class OrdersController extends Controller {

    public function orders() {
        $orders = Order::all();
        return view('admin.orders.index', compact('orders'));
    }

    public function delete($id) {
        $order = Order::find($id);
        $order->delete();
        return redirect('admin-orders')->with('status', 'Категория е изтрита!');
    }

    public function edit($id) {
        $orders = Order::find($id);
        return view('admin.orders.edit', compact('orders'));
    }

}
