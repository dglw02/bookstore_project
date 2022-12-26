<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Support\Facades\DB;

class AdminOrdersController extends Controller
{
    function detail($orders_id){
        $order = Order::findOrFail($orders_id);
        $order_details = OrderDetails::where('orders_id', $orders_id)->get();
        return view('admin.order.order-detail', compact('order_details', 'order'));
    }

    public function destroy($orders_id){
        $orders = Order::findOrFail($orders_id);
        $orders->delete();
        return redirect('/admin/order')->with('completed', 'Order has been deleted');
    }
}
