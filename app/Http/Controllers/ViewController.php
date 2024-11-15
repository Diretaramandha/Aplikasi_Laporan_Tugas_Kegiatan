<?php

namespace App\Http\Controllers;

use App\Models\Event;
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

    public function view_user(){
        $data['users'] = User::all();
        return view("pages.user",$data);
    }
    public function view_user_create(){
        // $data['users'] = User::all();
        return view("pages.user.create");
    }
    public function view_user_update($id){
        $data['user'] = User::where('id',$id)->first();
        return view("pages.user.update",$data);
    }
    public function view_user_delete($id){
        User::where('id',$id)->delete();
        return redirect('/user');
    }

    public function view_event(){
        $data['events'] = Event::all();
        return view("pages.event",$data);
    }
    public function view_event_create(){
        // $data['events'] = Event::all();
        return view("pages.event.create",);
    }
    public function view_event_detail($id){
        // $data[""] =
        return view("pages.event.detail",);
    }

    public function view_task_create($id){
        $data['event'] = Event::where('id',$id)->first();
        return view('pages.Task.create',$data);
    }
}
