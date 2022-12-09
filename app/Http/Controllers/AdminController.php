<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('is_Admin');
    }

    function viewHome(){
        return view('admin/home');
    }

    function viewDashboard(){
        return view('admin/dashboard');
    }

    function viewAllProducts(){
        return view('admin/book/index');
    }

    function viewAllUsers(){
        return view('admin/user/index');
    }

    function viewAllOrders(){
        return view('admin/order/all-orders');
    }

    function viewAllCategory(){
        return view('admin/category/index');
    }

    function viewProfile(){
        return view('admin/settings');
    }
}
