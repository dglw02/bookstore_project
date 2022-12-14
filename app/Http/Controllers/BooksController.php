<?php

namespace App\Http\Controllers;

use App\Models\Category;
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

    function allCategory(){
        $categories = Category::get();
        return view('category',compact('categories'));
    }


    function allBooks(){
        $data = Books::all();
        return view('allbooks',['books'=>$data]);
    }


    function showDetail($books_id){
        $books = Books::find($books_id);
        $category = Category::all();
        return view('detail',compact('category','books',));
    }

    function search(Request $req){
        $data = Books::where('books_name','like', '%'.$req->input('query').'%')->get();
        return view('search',['books'=>$data]);
    }


    function productsByCategory($category_name){
        $category =Category::where('category_name',$category_name)->first();
        if($category){
            $books = $category->books()->get();
            return view('category.index',compact('category','books',));
        }else{
            return redirect()->back();
        }
    }


}
