<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    //
    function login(Request $req){
        return $req->input();
    }

    public function index(){
        $orders = Order::where('user_id',Auth::id())->get();
        return view('myorders',compact('orders'));
    }

    public function view($orders_id){
        $orders = Order::where('orders_id', $orders_id)->where('user_id',Auth::id())->first();
        return view('vieworder', compact('orders'));
    }

    public function deleteOrders($orders)
    {
        $orders = Order::findOrFail($orders);
        $orders->delete();
        toast('This order has been cancelled','warning');
        return redirect('/my-order');

    }
}
