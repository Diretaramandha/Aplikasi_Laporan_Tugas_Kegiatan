<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function auth_user(Request $request){
        $validate = $request->validate([
            "email"=> ["required","email"],
            "password"=> ["required"],
        ]);

        if(Auth::attempt($validate)){
            alert()->info('Login Success','Welcome, '.Auth::user()->name);
            return redirect("/dashboard");
        }
        alert()->error('Login Failed','Check email and password');
        return redirect()->back();
    }
    public function logout_user(){
        Auth::logout();
        alert()->info('You are Logout','See you next time');
        return redirect("/sign-in");
    }
}
