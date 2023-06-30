<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AdminChartController extends Controller
{
    public function index(){
        $orders = Order::where('orders_status', '3')->select(DB::raw("sum(orders_price) as orders_price"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('orders_price');

        return view('admin.chart.month_revenue', compact('orders'));

    }
}
