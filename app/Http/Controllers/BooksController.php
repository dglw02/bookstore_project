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
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;
use MongoDB\Driver\Session;

class BooksController extends Controller
{
    //
    function showBooks(){
        $books = Books::all()->random(9);
        $author =Author::all();
        $category =Category::all();
        $newbook =Books::orderBy('created_at','DESC')->get()->take(9);
        return view('home',compact('books','author','category','newbook'));
    }

    function allCategory(){
        $categories = Category::get();
        return view('category',compact('categories'));
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
            if ($cart = Cart::where('books_id', $request->id)->first()) {
                $cart->increment('books_quantity',$request->books_quantity);
                Alert::success('Update quantity successfully', 'Thank for your purchasing.');
                return redirect()->back();
            }else {
                $cart = new cart;
                $cart->user_id = $user->id;
                $cart->books_id = $books->books_id;
                $cart->books_quantity = $request->books_quantity;
                $cart->save();
                Alert::success('Add cart Successfully', 'Thank for your purchasing.');
                return redirect()->back();
            }

            }

        else
        {
            return redirect('login');
        }
    }

    function cartList()
    {
        $cartitems = Cart::where('user_id', Auth::id())->get();
        return view('cartlist', compact('cartitems'));
    }

    function updateCart(Request $request,$id){

        $updateData = $request->validate([
            'books_quantity' => 'required|numeric',
        ]);
        Cart::where('id',"=",$id)->update($updateData);

        toast('Update completed','success');
        return redirect('/cartlist/');
    }




    public function deleteCart($cartitems)
    {
        $cartitems = Cart::findOrFail($cartitems);
        $cartitems->delete();
        toast('This book has been deleted','warning');
        return redirect('/cartlist');

    }

    public function deleteAllCart()
    {
        $cartitems = Cart::where('user_id',Auth::id())->get();
        Cart::destroy($cartitems);
        alert()->warning('All books has been deleted','there no book in cart');
        return redirect('/cartlist');
    }

    function cartcount(){
        $cartcount = Cart::where('user_id',Auth::id())->count();
        return response()->json(['count'=>$cartcount]);
    }

}
