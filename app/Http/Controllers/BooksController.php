<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Books;

class BooksController extends Controller
{
    //
    function showBooks(){
        $data = Books::all();
        return view('home',['books'=>$data]);
    }


    function showDetail($books_id){
        $data = Books::find($books_id);
        return view('detail',['books'=>$data]);
    }
}
