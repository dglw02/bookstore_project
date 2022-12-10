<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BooksController extends Controller
{
    //
    function index(){
        $books = DB::table('books')->get();
        dd($books);
        return view('home',['books'=> $books]);
    }
}
//function
