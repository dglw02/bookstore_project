<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
