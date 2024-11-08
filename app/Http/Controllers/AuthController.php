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
            return redirect("/dashboard");
        }
        return redirect()->back();
    }
    public function logout_user(){
        Auth::logout();
        return redirect("/");
    }
}
