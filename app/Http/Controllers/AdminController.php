<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $books = DB::table('books')
            ->join('categories', 'books.category_id', '=', 'categories.category_id')
            ->join('publishers', 'books.publisher_id', '=', 'publishers.publisher_id')
            ->join('authors', 'books.books_author', '=', 'authors.author_id')
            ->select('books.*', 'categories.category_name', 'publishers.publisher_name','authors.author_name')->get();
        return view('admin/book/index',['books'=> $books]);
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
