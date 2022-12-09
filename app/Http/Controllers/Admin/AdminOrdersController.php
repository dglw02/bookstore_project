<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class AdminOrdersController extends Controller
{
    public function index()
    {
        return view('admin.order.all-orders');
    }
}
