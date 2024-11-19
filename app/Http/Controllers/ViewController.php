<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Member;
use App\Models\Report;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewController extends Controller
{

    //--Dashboard
    public function view_dashboard()
    {
        $user = Auth::user();
        $data['event'] = Event::with('user')
            ->where('create_by', $user->id)->get();

        $data['member'] = Member::all();
        // $data['user'] = User::all();
        return view("pages.dashboard", $data);
    }
    //--profile
    public function view_profile(){
        return view('pages.profile');
    }
    //--User
    public function view_user()
    {
        $data['users'] = User::all();
        return view("pages.user", $data);
    }
    public function view_user_create()
    {
        // $data['users'] = User::all();
        return view("pages.user.create");
    }
    public function view_user_update($id)
    {
        $data['user'] = User::where('id', $id)->first();
        return view("pages.user.update", $data);
    }
    public function view_user_delete($id)
    {
        User::where('id', $id)->delete();
        return redirect('/user');
    }

    //--Event
    public function view_event()
    {
        $data['events'] = Event::all();
        return view("pages.event", $data);
    }
    public function view_event_create()
    {
        // $data['events'] = Event::all();
        return view("pages.event.create",);
    }
    public function view_event_update($id)
    {
        $data['event'] = Event::where('id', $id)->first();
        return view("pages.event.update", $data);
    }
    public function view_event_delete($id)
    {
        Event::where("id", $id)->delete();
        return redirect('/event');
    }

    //--Task
    public function view_task($id)
    {
        $data['task'] = Task::with('event')
            ->where('id_event', $id)
            ->where('tasks_idtask', null)
            ->get();

        // $task_id = $data['task'][0]->id;

        // $data['sub_task'] = Task::with('event')
        //     ->where('tasks_idtask', $task_id)
        //     ->count();

        $data['id'] = $id;
        return view("pages.Task.task", $data);
    }
    public function view_task_create($id)
    {
        $data['event'] = Event::where('id', $id)->first();
        return view('pages.Task.create', $data);
    }
    public function view_task_update($id_event, $id)
    {
        $data['task'] = Task::with('event')
            ->find($id);
        // ->get();
        return view('pages.Task.update', $data);
    }
    public function view_task_delete($id_event, $id)
    {
        Task::where('id', $id)->delete();
        return redirect('/task/' . $id_event);
    }

    //--sub-task
    public function view_sub_task($id_event, $id)
    {
        $data['sub_task'] = Task::with('event')
            ->where('tasks_idtask', $id)
            ->get();

        $data['id_event'] = $id_event;
        $data['id_task'] = $id;
        return view('pages.Task.sub-task.task', $data);
    }
    public function view_sub_task_create($id_event, $id)
    {
        $data['id_event'] = $id_event;
        $data['id_task'] = $id;
        return view('pages.Task.sub-task.create', $data);
    }
    public function view_sub_task_update($id_event, $id_task, $id_sub_task)
    {
        $data['sub_task'] = Task::with('event')
            ->find($id_sub_task);
        // $data['id_event'] = $id_event;
        // $data['id_task'] = $id_task;
        return view('pages.Task.sub-task.update', $data);
    }
    public function view_sub_task_delete($id_event, $id_task, $id_sub_task)
    {
        Task::where('id', $id_sub_task)->delete();
        return redirect('/task/' . $id_event . '/sub-task/' . $id_task);
    }

    //--report
    public function view_report(){
        $data['event'] = Event::all();

        return view('pages.report.report-event', $data);
    }
    public function view_report_main_task($id_event){
        $data['task'] = Task::with('event')
        ->where('tasks_idtask',null)
        ->where('id_event',$id_event)
        ->get( );

        return view('pages.report.report_main_task', $data);
    }
    public function view_report_task($id_event,$id_task){
        $data['task'] = Task::with('event','report')
            ->whereNotNull('tasks_idtask')
            ->where('id_event', $id_event)
            ->get();
        // $data['report'] = Report::with('task')
        // ->get();


        return view('pages.report.tables_report', $data);
    }
    public function view_report_create($id_task)
    {
        $data['task_report'] = $id_task;
        // $data['id_task'] = $id_task;
        // ->get();
        return view('pages.report.report', $data);
    }
    public function view_report_detail($id_report)
    {
        $data['id_report'] = $id_report;
        return view('pages.report.report_detail', $data);
    }
}
