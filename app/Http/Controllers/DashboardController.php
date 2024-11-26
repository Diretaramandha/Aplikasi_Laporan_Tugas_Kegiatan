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

    public function view_dashboard()
    {
        $user = Auth::user();


        $data['event_all'] = Event::all()->count();
        $data['event'] = Event::with('user')
            ->where('create_by', $user->id)
            ->get();


        // $data['member'] = Member::all();
        return view("pages.dahsboard.dashboard", $data);
    }


    public function view_report_main_tasks(Request $request, $id_event)
    {
        if ($request->id) {
            $tasks = Task::where('tasks_idtask',$request->id_tasks)
            ->where('id_event',$id_event)
            ->with('event','tasks')
            ->get();
        } else {
            $tasks = Task::whereNull('tasks_idtask')
            ->where('id_event',$id_event)
            ->with('event','tasks')
            ->get();
        }

        $reports = [];

        foreach ($tasks as $key => $item) {
            # code...
            $tasksId = $this->getTasksHierarchy($item->id);

            $tasksIds = collect(json_encode($tasksId))->pluck('id')->toArray();

            $reports[$item->id] = Report::withCount('detailReport')
            ->whereIn('tasks_idtask',$tasksIds)
            ->get()

            ->map(function ($report){
                $report->has_details = $report->detailReport_count > 0 ? 1 : 0;
                return $report;
            });
        }

        // $data['tasks'] = Report::whereHas('tasks', function ($query) use ($id_event) {
        //     $query->where('id_event', $id_event)
        //         ->whereNull('tasks_idtask');
        // })
        //     ->with(['tasks.event', 'detailReport'])
        //     ->get();

        // // Menghitung progress berdasarkan detail report
        // foreach ($data['tasks'] as $item) {
        //     if ($item->detailReport == null) {
        //         // Jika tidak ada detail report
        //         $item->progress = 0;
        //     } else {
        //         // Jika ada detail report
        //         $detailReport = $item->detailReport->first(); // Ambil detail report pertama
        //         if (is_null($detailReport->link_file) && is_null($detailReport->file_upload)) {
        //             // Jika link_file dan file_upload null
        //             $item->progress = 50;
        //         } else {
        //             // Jika semua sudah diisi
        //             $item->progress = 100;
        //         }
        //     }


        echo json_encode($tasks);
        // return view('pages.dahsboard.view_main_report', compact('tasks','reports'));
    }

    function getTasksHierarchy($parent_id){
        $tasks = Task::select('tasks.id')->where('tasks_idtask',$parent_id)->get();
        $parent = '[{"id" :'.$parent_id.' }]';

        $result = collect(json_encode($parent));

        foreach ($tasks as $key => $task) {
            # code...
            $result->push($task);
            $result = $result->merge($this->getTasksHierarchy($task->id));
        }

        return $result;
    }


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
