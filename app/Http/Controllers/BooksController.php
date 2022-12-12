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

    function showEducationBooks($category_id){
        $data =Books::where('category_id', $category_id)->get();
        return view('category/education',['books'=>$data]);
    }

    function allBooks(){
        $data = Books::all();
        return view('allbooks',['books'=>$data]);
    }


    function showDetail($books_id){
        $data = Books::find($books_id);
        return view('detail',['books'=>$data]);
    }

    function search(Request $req){
        $data = Books::where('books_name','like', '%'.$req->input('query').'%')->get();
        return view('search',['books'=>$data]);
    }

    function addToCart(Request $req){
        if($req->session()->has('user')){
            return "hello";
        }
        else{
            return redirect('login');
        }
    }
}
