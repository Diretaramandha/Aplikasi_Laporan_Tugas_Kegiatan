<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class ViewController extends Controller
{

    //--Dashboard
    public function view_dashboard(){
        return view("pages.dashboard");
    }

    //--tables
    public function view_tables(){
        return view("pages.tables");
    }

    //--User
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

    //--Event
    public function view_event(){
        $data['events'] = Event::all();
        return view("pages.event",$data);
    }
    public function view_event_create(){
        // $data['events'] = Event::all();
        return view("pages.event.create",);
    }

    //--Task
    public function view_task($id){
        $data['task'] = Task::with('event')
        ->where('id_event',$id)
        ->get();
        $data['id'] = $id;
        return view("pages.Task.task",$data);
    }
    public function view_task_create($id){
        $data['event'] = Event::where('id',$id)->first();
        return view('pages.Task.create',$data);
    }
    public function view_task_update($id_event,$id){
        $data['task'] = Task::with('event')
        ->find($id );
        // ->get();
        return view('pages.Task.update',$data);
    }
    public function view_task_delete($id_event,$id){
        Task::where('id',$id)->delete();
        return redirect('/task/'. $id_event);
    }
}
