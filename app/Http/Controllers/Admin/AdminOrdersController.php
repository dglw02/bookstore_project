<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class AdminOrdersController extends Controller
{
    function detail(){
        /*$order_details = DB::table('order_details')
            ->join() */
        return view('admin.order.order-detail');
    }

    public function destroy($orders_id){
        $orders = Order::findOrFail($orders_id);
        $orders->delete();
        return redirect('/admin/order')->with('completed', 'Order has been deleted');
    }
}
