<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\District;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Province;
use App\Models\Wards;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class AdminOrdersController extends Controller
{
    function detail($orders_id)
    {
        $order = Order::findOrFail($orders_id);
        $order_details = OrderDetails::where('orders_id', $orders_id)->get();
        $provinces = Province::get();
        $districts = District::get();
        $wards = Wards::get();
        return view('admin.order.order-detail', compact('order_details', 'order'), ['province' => $provinces,
            'district'=>$districts, 'wards'=>$wards]);
    }

    function update(Request $request,$orders_id)
    {
        $order = Order::findOrFail($orders_id);
        $order -> orders_status = $request->input('orders_status');
        $order->update();
        alert()->success('Success','Order have been updated.');
        return redirect('/admin/order');

    }

    public function destroy($orders_id){
        $orders = Order::findOrFail($orders_id);
        $orders->delete();
        alert()->success('Success','Order have been deleted.');
        return redirect('/admin/order');
    }


    public function approvedOrder(){
        $orders = Order::where('orders_status', '1')->get();
        return view('admin.order.approved-orders', compact('orders'));
    }

    public function transportedOrder(){
        $orders = Order::where('orders_status', '2')->get();
        return view('admin.order.transported-orders', compact('orders'));
    }

    public function completedOrder(){
        $orders = Order::where('orders_status', '3')->get();
        return view('admin.order.completed-orders', compact('orders'));
    }


    public function canceledOrder(){
        $orders = Order::where('orders_status', '4')->get();
        return view('admin.order.canceled-order', compact('orders'));
    }
}
