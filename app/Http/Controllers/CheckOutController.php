<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckOutController extends Controller
{
    //
    public function index(){
        $cartitems = Cart::where('user_id',Auth::id())->get();
        return view('checkout',compact('cartitems'));
    }



    public  function placeorder(Request $request){
        $order = new Order();
        $order->user_id = Auth::id();
        $order->orders_name = $request->input('orders_name');
        $order->orders_email = $request->input('orders_email');
        $order->orders_payment = $request->input('orders_payment');
        $order->orders_address = $request->input('orders_address');
        $order->orders_phone = $request->input('orders_phone');
        $order->orders_city = $request->input('orders_city');
        $total = 0;

        $cartitems_total = Cart::where('user_id',Auth::id())->get();
        foreach ($cartitems_total as $item){
            $total += $item->books->books_price * $item->books_quantity;
        }
        $grandtotal = $total +($total * 0.1) + Auth::user()->city->areas->areas_price;
        $order->orders_price = $grandtotal;


        $order->order_tracking = 'tracking'.rand(1000,9999);
        $order->save();


        $cartitems = Cart::where('user_id',Auth::id())->get();
        foreach ($cartitems as $item){
            OrderDetails::create([
                'orders_id'=>$order->orders_id,
                'books_id'=>$item->books_id,
                'quantity'=>$item->books_quantity,
                'price'=>$item->books->books_price,
            ]);
            $book = Books::where('books_id',$item->books_id)->first();
            $book->books_quantity = $book->books_quantity -$item->books_quantity;
            $book->update();
        }

        if(Auth::user()->address==null){
            $user = User::where('id',Auth::id())->first();
            $user->orders_name = $request->input('orders_name');
            $user->orders_email = $request->input('orders_email');
            $user->orders_payment = $request->input('orders_payment');
            $user->orders_address = $request->input('orders_address');
            $user->orders_phone = $request->input('orders_phone');
            $user->orders_city = $request->input('orders_city');
            $user->update();
        }
        $cartitems = Cart::where('user_id',Auth::id())->get();
        Cart::destroy($cartitems);
        return redirect('/')->with('status','Order placed Successfully');
    }
}
