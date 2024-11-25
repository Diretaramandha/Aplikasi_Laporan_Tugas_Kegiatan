<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Member;
use App\Models\Report;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    // public function calculateProgress($subTasks)
    // {
    //     $totalSubTasks = $subTasks->count();
    //     $completedSubTasks = 0;

    //     foreach ($subTasks as $subTask) {
    //         $completedSubTasks += $subTask->status === 'completed' ? 1 : 0;
    //         // Jika sub-task memiliki sub-task lain, panggil fungsi ini secara rekursif
    //         if ($subTask->subTasks->isNotEmpty()) {
    //             $completedSubTasks += $this->calculateProgress($subTask->subTasks);
    //         }
    //     }

    //     return $totalSubTasks > 0 ? ($completedSubTasks / $totalSubTasks) * 100 : 0;
    // }
    public function view_dashboard()
    {
        $user = Auth::user();
        $data['event'] = Event::with('user')
            ->where('create_by', $user->id)
            ->get();
        $data['event_all'] = Event::all()->count();


        // $data['member'] = Member::all();
        return view("pages.dahsboard.dashboard", $data);
    }
    public function view_report_main_tasks($id_event)
    {
        $data['tasks'] = Task::with('event', 'tasks') // Pastikan Anda memuat relasi sub-task
            ->where('id_event', $id_event)
            ->whereNull('tasks_idtask')
            ->get();

        // Hitung progress untuk setiap main task
        foreach ($data['tasks'] as $item) {
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
