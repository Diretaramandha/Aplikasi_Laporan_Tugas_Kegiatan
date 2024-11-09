<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function view_dashboard(){
        return view("pages.dashboard");
    }
    public function view_tables(){
        return view("pages.tables");
    }
    public function view_add_user(){
        $data['users'] = User::all();
        return view("pages.add-user",$data);
    }
    public function view_user_create(){
        // $data['users'] = User::all();
        return view("pages.user.create");
    }
}
