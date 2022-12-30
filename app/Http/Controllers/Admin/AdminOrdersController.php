<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Order;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class AdminOrdersController extends Controller
{
    function detail($orders_id)
    {
        $order = Order::findOrFail($orders_id);
        $order_details = OrderDetails::where('orders_id', $orders_id)->get();
        $cities = City::get();
        return view('admin.order.order-detail', compact('order_details', 'order'), ['cities' => $cities]);
    }

    function update(Request $request,$orders_id)
    {
        $order = Order::findOrFail($orders_id);
        $order -> orders_status = $request->input('orders_status');
        $order->update();
        return redirect('/admin/order');

    }

    public function destroy($orders_id){
        $orders = Order::findOrFail($orders_id);
        $orders->delete();
        return redirect('/admin/order')->with('completed', 'Order has been deleted');
    }

    public function completedOrder(){
        $orders = Order::where('orders_status', '2')->get();
        return view('admin.order.all-orders', compact('orders'));
    }

    public function approvedOrder(){
        $orders = Order::where('orders_status', '1')->get();
        return view('admin.order.all-orders', compact('orders'));
    }

    public function canceledOrder(){
        $orders = Order::where('orders_status', '3')->get();
        return view('admin.order.all-orders', compact('orders'));
    }
}
