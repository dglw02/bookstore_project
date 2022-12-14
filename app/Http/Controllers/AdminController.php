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
        $users = DB::table('users')
            ->join('provinces', 'users.user_province', '=', 'provinces.province_id')
            ->select('users.*', 'provinces.province_name')->get();
        return view('admin/user/index', ['users'=> $users]);
    }

    function viewAllOrders(){
        return view('admin/order/all-orders');
    }

    function viewProfile(){
        return view('admin/settings');
    }
}
