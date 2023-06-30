<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AdminChartController extends Controller
{
    public function index(){
        $year = [0,0,0,0,0,0,0,0,0,0,0,0];
        $orders=DB::table('orders')
            ->select(DB::raw("sum(orders_price) as orders_price"),
                DB::raw('MONTH(created_at) as month'))
            ->groupBy('month')
            ->get();

        foreach($orders as $key){
            $year[$key->month-1] = $key->count;

            return view('admin.chart.day_revenue', compact('orders'));

        }
    }
}
