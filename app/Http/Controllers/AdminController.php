<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Books;
use RealRashid\SweetAlert\Facades\Alert;
class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('is_Admin');
    }

    function viewHome(){
        return view('admin/home');
    }

    function viewDashboard(){
            $users = User::all();
            $total_earning = Order::where('orders_status', '2')->sum('orders_price');
            $books_quantity = Books::sum('books_quantity');
            $pending_orders = Order::where('orders_status', '0')->get();

        return view('admin/dashboard', compact('users', 'books_quantity',
            'total_earning', 'pending_orders'));
    }

    function viewAllCategory(){
        $categories = DB::table('categories')->get();
        return view('admin/category/index', ['categories'=> $categories]);
    }

    function viewAllAuthor(){
        $authors = DB::table('authors')->get();
        return view('admin/author/index', ['authors'=> $authors]);
    }

    function viewAllProducts(){
        $books = DB::table('books')
            ->join('categories', 'books.category_id', '=', 'categories.category_id')
            ->join('publishers', 'books.publisher_id', '=', 'publishers.publisher_id')
            ->join('authors', 'books.books_author', '=', 'authors.author_id')
            ->select('books.*', 'categories.category_name', 'publishers.publisher_name','authors.author_name')->get();
        return view('admin/book/index',['books'=> $books]);
    }


    function viewAllUsers(){
        $users = DB::table('users')->where('isAdmin', '0')
            ->join('cities', 'users.user_city', '=', 'cities.city_id')
            ->select('users.*', 'cities.city_name')->get();
        return view('admin/user/index', ['users'=> $users]);
    }

    function viewAllAdmin()
    {
        $users = DB::table('users')->where('isAdmin', '1')
            ->join('cities', 'users.user_city', '=', 'cities.city_id')
            ->select('users.*', 'cities.city_name')->get();
        return view('admin/user/admin_index', ['users' => $users]);
    }

    function viewAllOrders(){
        $orders = Order::where('orders_status', '0')->get();
        return view('admin/order/all-orders', ['orders'=> $orders]);
    }

    function viewProfile(){
        return view('admin/settings');
    }
}
