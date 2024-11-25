<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function view_user()
    {
        $data['users'] = User::all();
        return view("pages.user", $data);
    }

    public function view_user_create()
    {
        return view("pages.user.create");
    }

    public function view_user_update($id)
    {
        $data['user'] = User::findOrFail($id);
        return view("pages.user.update", $data);
    }

    public function view_user_delete($id)
    {
        User::destroy($id);
        return redirect('/user');
    }
    public function view_profile()
    {
        $data['user'] = Auth::user();
        return view('pages.profile', $data);
    }
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
            toast('Failed Create User', 'warning');
            return redirect()->back();
        }
        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->nohp = $request->nohp;
        $user->level = $request->level;
        $user->address = $request->address;
        $user->password = bcrypt($request->password);
        $user->save();

        toast('Success Create User', 'success');
        return redirect('/user');
    }
    public function user_update(Request $request)
    {
        $create = $request->validate([
            'name' => ['required'],
            'username' => ['required'],
            'email' => ['required', 'email'],
            'nohp' => ['required'],
            'address' => ['required'],
            'level' => ['required'],
            'password' => ['required'],
        ]);
        if (!$create) {

            toast('Failed Update User', 'warning');
            return redirect()->back();
        }
        $user = User::where('id', $request->id);
        $user->update([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'nohp' => $request->nohp,
            'address' => $request->address,
            'level' => $request->level,
            'password' => bcrypt($request->password),
        ]);
        toast('Success update User', 'success');
        return redirect('/user');
    }
    public function profile_change(Request $request, $id_user)
{
    // Validasi input
    $create = $request->validate([
        'name' => ['required'],
        'username' => ['required'],
        'email' => ['required', 'email'],
        'nohp' => ['required'],
        'address' => ['required'],
        'level' => ['required'],
        'password' => ['nullable'],
    ]);

    $user = User::find($id_user);
    if (!$user) {
        toast('User  not found', 'error');
        return redirect()->back();
    }

    $user->update([
        'name' => $request->name,
        'username' => $request->username,
        'email' => $request->email,
        'nohp' => $request->nohp,
        'address' => $request->address,
        'level' => $request->level,
        'password' => bcrypt($request->password),
    ]);

    // if (!empty($request->password)) {
    //     $user->update([
    //     ]);
    // }

    toast('Success update your profile', 'success');
    return redirect('/profile');
}
}
