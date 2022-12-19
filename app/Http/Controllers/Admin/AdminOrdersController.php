<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;

class AdminOrdersController extends Controller
{
    function detail(){
        return view('admin.order.order-detail');
    }

    public function destroy($orders_id){
        $orders = Order::findOrFail($orders_id);
        $orders->delete();
        return redirect('/admin/order')->with('completed', 'Order has been deleted');
    }
}
