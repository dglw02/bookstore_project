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
        $data = Books::find($books_id);
        $books = DB::table('books')
            ->join('categories', 'books.category_id', '=', 'categories.category_id')
            ->join('publishers', 'books.publisher_id', '=', 'publishers.publisher_id')
            ->join('authors', 'books.books_author', '=', 'authors.author_id')
            ->select('books.*', 'categories.category_name', 'publishers.publisher_name','authors.author_name')->get();
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
