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


        $data['event_all'] = Event::all()->count();
        $data['event'] = Event::with('user')
            ->where('create_by', $user->id)
            ->get();

        // Iterate through the events and calculate the progress for each
        // foreach ($data['event'] as $event) {
        //     foreach ($data['event'] as $event) {
        //         $event->progress = 0; // Initialize $progress
        //         $event->progress_percentage = 0; // Initialize $progress_percentage
        //         $event->progress = calculateEventProgress($event);
        //         $event->progress_percentage = round($event->progress);
        //     }
        // }


        // $data['member'] = Member::all();
        return view("pages.dahsboard.dashboard", $data);
    }


    public function view_report_main_tasks($id_event)
    {
        // $data['tasks'] = Task::with('event', 'tasks', 'report') // Memuat relasi sub-task
        //     ->where('id_event', $id_event)
        //     ->whereNull('tasks_idtask')
        //     ->get();

        $data['tasks'] = Report::whereHas('tasks', function ($query) use ($id_event) {
            $query->where('id_event', $id_event)
                ->whereNull('tasks_idtask');
        })
            ->with(['tasks.event', 'detailReport'])
            ->get();

        // Menghitung progress berdasarkan detail report
        foreach ($data['tasks'] as $item) {
            if ($item->detailReport == null) {
                // Jika tidak ada detail report
                $item->progress = 0;
            } else {
                // Jika ada detail report
                $detailReport = $item->detailReport->first(); // Ambil detail report pertama
                if (is_null($detailReport->link_file) && is_null($detailReport->file_upload)) {
                    // Jika link_file dan file_upload null
                    $item->progress = 50;
                } else {
                    // Jika semua sudah diisi
                    $item->progress = 100;
                }
            }
        }
        // // Menghitung progress untuk setiap main task
        // foreach ($data['tasks'] as $mainTask) {
        //     $mainTask->progress = $this->calculateProgress($mainTask);
        // }

        // echo json_encode($data['tasks']);
        return view('pages.dahsboard.view_main_report', $data);
    }

    // private function calculateProgress($task)
    // {
    //     // Ambil semua subtask
    //     $subTasks = $task->tasks;
    //     $completedSubtasks = 0;
    //     $subTaskCount = count($subTasks);

    //     if ($subTaskCount === 0) {
    //         return 0; // Jika tidak ada subtask, progress = 0
    //     }

    //     foreach ($subTasks as $subTask) {
    //         // Hitung progress subtask secara rekursif
    //         $subTaskProgress = $this->calculateProgress($subTask);

    //         // Jika subtask memiliki detail report, anggap selesai
    //         if ($subTask->detailReport) {
    //             $completedSubtasks++;
    //         }
    //     }

    //     // Hitung rata-rata progres dari semua subtask
    //     $totalProgress = ($completedSubtasks / $subTaskCount) * 100;

    //     // Jika ada subtask, tambahkan progres dari subtask ke main task
    //     // Anda juga bisa mempertimbangkan progres dari subtask
    //     // untuk memperkirakan progres main task jika diinginkan
    //     return $totalProgress;
    // }
    public function view_report_tasks($id_event, $id_task)
    {
        $data['task'] = Report::whereHas('tasks', function ($query) use ($id_event, $id_task) {
            $query->where('id_event', $id_event)
                ->where('tasks_idtask', $id_task);
        })
            ->with(['tasks', 'detailReport'])
            ->get();

        // Menghitung progress berdasarkan detail report
        foreach ($data['task'] as $item) {
            if ($item->detailReport == null) {
                // Jika tidak ada detail report
                $item->progress = 0;
            } else {
                // Jika ada detail report
                $detailReport = $item->detailReport->first(); // Ambil detail report pertama
                if (is_null($detailReport->link_file) && is_null($detailReport->file_upload)) {
                    // Jika link_file dan file_upload null
                    $item->progress = 50;
                } else {
                    // Jika semua sudah diisi
                    $item->progress = 100;
                }
            }
        }

        return view('pages.dahsboard.view_task_report', $data);
    }
}
