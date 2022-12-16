<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Books;
use App\Models\Category;
use App\Models\Province;
use App\Models\Publisher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    function viewLogin(){
        return view('/login');
    }

    function login(Request $request){
        $email = $request->get('email');
        $password = $request->get('password');

        $rs = Auth::attempt(
            ['email' => $email,'password'=>$password]
        );
        if ($rs == true){
            $user = Auth::user();
            if ($user-> isAdmin == 1){
                return redirect('admin/home');
            }
            else{
                return redirect('/');
            }
        }
        else{
            return view('/login');
        }
    }

    function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');

    }

    public function createUser()
    {
        $provinces = Province::get();
        return view('register', ['provinces' => $provinces]);
    }

    public function hashPassword()
    {

    }

    public function storeUser(Request $request)
    {
        $storeData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required',
            'password' => 'required',
            'user_province' => 'required',
            'phone' => 'required|max:10|numeric',
            'isAdmin' => 'false',
        ]);
        $user = User::create($storeData);
        return redirect('/')->with('completed', 'Has created account!');
    }
}
