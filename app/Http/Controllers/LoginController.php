<?php

namespace App\Http\Controllers;

use App\Models\Areas;
use App\Models\City;
use App\Models\Province;
use App\Models\Publisher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

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
                return redirect('admin/dashboard');
            }
            else{
                alert()->success('Login complete','Now you can go shopping.');
                return redirect('/');
            }
        }
        else{
            alert()->error('Email or Password is incorrect','Please enter again');
            return view('/login');
        }
    }

    function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        toast('Logout','success');
        return redirect('/');

    }

    public function createUser()
    {
        $province = Province::get();
        return view('register', ['province' => $province]);
    }



    public function storeUser(Request $request)
    {
        $storeData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'address' => 'required|max:255',
            'phone' => 'required',
            'user_province' => 'required',
            'password' => 'required|confirmed|min:6',
        ]);
            $storeData ['password'] = Hash::make($storeData ['password']);
            //dd($storeData);
            User::create($storeData);
            alert()->success('Register complete','Please login again to go shopping.');
            return redirect('/');
    }
}
