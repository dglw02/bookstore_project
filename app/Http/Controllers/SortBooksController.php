<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Category;
use Request;

class SortBooksController extends Controller
{
    //
    function allBooks(){
        $data = Books::all();

        if(Request::get('sort')=='price_asc'){
            $data = Books::orderBy('books_price','ASC')->get();
        }

        elseif(Request::get('sort') =='price_desc'){
            $data = Books::orderBy('books_price','DESC')->get();
        }

        return view('allbooks',['books'=>$data]);
    }


    function productsByCategory($category_name){
        $category =Category::where('category_name',$category_name)->first();
        $books = $category->books()->get();
        $category_id = $category->category_id;
        
        if(Request::get('sort')=='price_asc'){
            $books = $category->books()->where('category_id',$category_id)->orderBy('books_price','ASC')->get();
        }
        elseif(Request::get('sort') =='price_desc'){
            $books = $category->books()->where('category_id',$category_id)->orderBy('books_price','DESC')->get();
        }
        return view('category.index',compact('category','books',));
    }
}
