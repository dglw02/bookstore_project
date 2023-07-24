<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Books;
use App\Models\OrderDetails;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('is_Admin');
    }

    function viewDashboard()
    {
            $user = Auth::user();
            if (is_null($user)){
                return redirect('/');
            }
            else{
                $users = User::where('isAdmin','false');
                $total_earning = Order::where('orders_status', '3')->sum('orders_price');
                $total_import = Invoice::all()->sum('invoices_total');
                $completed_orders = Order::where('orders_status', '3')->get();
                $pending_orders = Order::where('orders_status', '0')->get();


                $earning_month = Order::where('orders_status', '3')
                    ->whereMonth('created_at', Carbon::now()->month)
                    ->sum('orders_price');
                $import_month = Invoice::select('*')
                    ->whereMonth('invoices_date', Carbon::now()->month)
                    ->sum('invoices_total');


                $earning_year = Order::where('orders_status', '3')
                    ->whereYear('created_at', Carbon::now()->year)
                    ->sum('orders_price');
                $import_year = Invoice::select('*')
                    ->whereYear('invoices_date', Carbon::now()->year)
                    ->sum('invoices_total');

                $top = OrderDetails::with('books')
                    ->join('orders', 'orders.orders_id', '=', 'order_details.orders_id')
                    ->select('books_id', DB::raw('SUM(quantity) as count'))
                    ->where('orders.orders_status', '3')
                    ->groupBy('books_id')
                    ->orderBy("count", 'desc')
                    ->take(3)
                    ->get();

                $orders = Order::where('orders_status', '0')->get();


                return view('admin/dashboard', compact('users', 'completed_orders','total_import','earning_month','import_month','earning_year','import_year',
                    'total_earning', 'pending_orders', 'top', 'orders'));

            }
    }

    function viewAllCategory()
    {
        $categories = DB::table('categories')->get();
        return view('admin/category/index', ['categories' => $categories]);
    }

    function viewAllAuthor()
    {
        $authors = DB::table('authors')->get();
        return view('admin/author/index', ['authors' => $authors]);
    }

    function viewAllInvoice()
    {
        $orders = Order::where('orders_status', '0')->get();
        return view('admin/invoice/all-invoice', ['orders' => $orders]);
    }

    function viewAllProducts()
    {
        $books = DB::table('books')
            ->join('categories', 'books.category_id', '=', 'categories.category_id')
            ->join('publishers', 'books.publisher_id', '=', 'publishers.publisher_id')
            ->join('authors', 'books.books_author', '=', 'authors.author_id')
            ->select('books.*', 'categories.category_name', 'publishers.publisher_name', 'authors.author_name')->get();
        return view('admin/book/index', ['books' => $books]);
    }


    function viewAllUsers()
    {
        $users = DB::table('users')->where('isAdmin', '0')
            ->join('province', 'users.user_province', '=', 'province.province_id')
            ->select('users.*', 'province.province_name')->get();
        return view('admin/user/index', ['users' => $users]);
    }

    function viewAllAdmin()
    {
        $users = DB::table('users')->where('isAdmin', '1')
            ->join('province', 'users.user_province', '=', 'province.province_id')
            ->select('users.*', 'province.province_name')->get();
        return view('admin/user/admin_index', ['users' => $users]);
    }

    function viewAllOrders()
    {
        $orders = Order::where('orders_status', '0')->get();
        return view('admin/order/all-orders', ['orders' => $orders]);
    }

    function viewProfile()
    {
        return view('admin/settings');
    }
}
