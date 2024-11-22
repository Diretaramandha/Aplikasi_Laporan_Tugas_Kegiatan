<?php

namespace App\Http\Controllers;

use App\Models\DetailReport;
use App\Models\Event;
use App\Models\Member;
use App\Models\Report;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use function Laravel\Prompts\progress;

class ViewController extends Controller
{
    // Dashboard
    public function view_dashboard()
    {
        $user = Auth::user();
        $data['event'] = Event::with('user')
            ->where('create_by', $user->id)
            ->get();

        $data['member'] = Member::all();
        return view("pages.dahsboard.dashboard", $data);
    }

    // Profile
    public function view_profile()
    {
        $data['user'] = Auth::user();
        return view('pages.profile', $data);
    }

    // User Management
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

    // Event Management
    public function view_event()
    {
        $data['events'] = Event::all();
        return view("pages.event", $data);
    }

    public function view_event_create()
    {
        return view("pages.event.create");
    }

    public function view_event_update($id)
    {
        $data['event'] = Event::findOrFail($id);
        return view("pages.event.update", $data);
    }

    public function view_event_delete($id)
    {
        Event::destroy($id);
        return redirect('/event');
    }

    // Task Management
    public function view_task($id)
    {
        $data['task'] = Task::with('event')
            ->where('id_event', $id)
            ->whereNull('tasks_idtask')
            ->get();

        $data['id'] = $id;
        return view("pages.Task.task", $data);
    }

    public function view_task_create($id)
    {
        $data['event'] = Event::findOrFail($id);
        return view('pages.Task.create', $data);
    }

    public function view_task_update($id_event, $id)
    {
        $data['task'] = Task::with('event')->findOrFail($id);
        return view('pages.Task.update', $data);
    }

    public function view_task_delete($id_event, $id)
    {
        Task::destroy($id);
        return redirect('/task/' . $id_event);
    }

    // Sub-task Management
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
        $data['sub_task'] = Task::with('event')->findOrFail($id_sub_task);
        return view('pages.Task.sub-task.update', $data);
    }

    public function view_sub_task_delete($id_event, $id_task, $id_sub_task)
    {
        Task::destroy($id_sub_task);
        return redirect('/task/' . $id_event . '/sub-task/' . $id_task);
    }

    // Report Management
    public function view_report()
    {
        $data['report'] = Task::with('event', 'report', 'subTask')
            ->whereNull('tasks_idtask')
            ->get();

        return view('pages.report.report-event', $data);
    }

    public function view_report_task($id_event, $id_task)
    {
        $data['task'] = Report::whereHas('tasks', function ($query) use ($id_event, $id_task) {
            $query->where('id_event', $id_event)
                ->where('tasks_idtask', $id_task);
        })
            ->with('tasks', 'detailReport')
            ->get();

        $data['id_event'] = $id_event;
        return view('pages.report.tables_report', $data);
    }

    public function view_report_create($id_task)
    {
        $data['task_report'] = $id_task;
        return view('pages.report.report-create', $data);
    }

    public function view_report_detail($id_report)
    {
        $data['id_report'] = $id_report;
        return view('pages.report.report_detail', $data);
    }

    public function view_report_main_tasks($id_event)
    {
        $data['task'] = Task::with('event', 'tasks')
            ->where('id_event', $id_event)
            ->whereNull('tasks_idtask')
            ->get();

        // Hitung progress untuk setiap main task
        foreach ($data['task'] as $item) {
            $item->progress = $item->calculateProgress();
                Log::info("Task ID: {$item->id}, Progress: {$item->progress}");
        }
        return view('pages.dahsboard.view_main_report', $data);
    }
    public function view_report_tasks($id_event, $id_task)
    {
        $data['task'] = Report::whereHas('tasks', function ($query) use ($id_event, $id_task) {
            $query->where('id_event', $id_event)
                ->where('tasks_idtask', $id_task);
        })
            ->with(['tasks', 'detailReport'])
            ->get();

        // Hitung progress untuk setiap task
        foreach ($data['task'] as $item) {
            if ($item->detailReport && $item->detailReport->isNotEmpty()) {
                // Jika detail report ada, set progress ke 100
                $item->progress = 100;
            } else {
                // Jika tidak ada, set progress ke 0
                $item->progress = 0;
            }
        }

        return view('pages.dahsboard.view_task_report', $data);
    }
}
