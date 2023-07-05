<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AdminChartController extends Controller
{
    public function index(){
        $orders = Order::where('orders_status', '3')->select(DB::raw("sum(orders_price) as orders_price"), DB::raw("MONTHNAME(created_at) as month_name"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("month_name"))
            ->orderBy('orders_id','ASC')
            ->pluck('orders_price', 'month_name');

        $labels = $orders->keys();
        $data = $orders->values();

        return view('admin.chart.month_revenue', compact('labels', 'data'));

    }
}
