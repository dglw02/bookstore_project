<?php

namespace App\Http\Controllers;

use App\Models\Areas;
use App\Models\Author;
use App\Models\Books;
use App\Models\Category;
use App\Models\City;
use App\Models\Publisher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        $cities = City::get();
        return view('register', ['cities' => $cities]);
    }



    public function storeUser(Request $request)
    {
        $storeData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'address'=>'required|max:255',
            'password' => 'required',
            'user_city' => 'required',
            'phone' => 'required|numeric',
        ]);


        $storeData ['password']= Hash::make( $storeData ['password']);

        $user = User::create($storeData);
        return redirect('/')->with('completed', '!! Account has created !!');
    }
}
