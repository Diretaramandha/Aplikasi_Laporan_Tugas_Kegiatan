<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AddUserController extends Controller
{
    // ... inside AddUser Controller
    public function user_search(Request $request)
    {
        $search = $request->input('search');

        $data['users'] = User::where('name', 'LIKE', '%' . $search . '%')
            ->orWhere('email', 'LIKE', '%' . $search . '%')
            ->get();

        return view('pages.user', $data);
    }
    public function user_create(Request $request)
    {
        $create = $request->validate([
            'name' => ['required'],
            'username' => ['required'],
            'email' => ['required', 'email'],
            'nohp' => ['required'],
            'address' => ['required'],
            'password' => ['required'],
        ]);
        if (!$create) {
            return redirect()->back();
        }
        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->nohp = $request->nohp;
        $user->level = 'member';
        $user->address = $request->address;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect('/user');
    }
}
