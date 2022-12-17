<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Books;
use App\Models\Cart;
use App\Models\User;

class BooksController extends Controller
{
    //
    function showBooks(){
        $books = Books::all();
        $author =Author::all();
        $category =Category::all();
        $newbook =Books::orderBy('created_at','DESC')->get()->take(10);
        return view('home',compact('books','author','category','newbook'));
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
//new page
    function newestBook(){
        $books =Books::orderBy('created_at','DESC')->get()->take(10);
        return view('new',compact('books',));
    }

    function addCart(Request $request ,$books_id){
        if(Auth::id())
        {
            $user =auth()->user();
            $books=Books::find($books_id);
            $cart =new cart;
            $cart->cart_name=$user->name;
            $cart->cart_phone=$user->phone;
            $cart->cart_address=$user->address;
            $cart->books_name=$books->books_name;
            $cart->cart_price=$books->books_price;
            $cart->cart_quantity=$request->books_quantity;
            $cart->save();
            return redirect()->back();
        }
        else
        {
            return redirect('login');
        }
    }

}
