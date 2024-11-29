<?php

namespace App\Http\Controllers;

use App\Models\DetailReport;
use App\Models\Report;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
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
                ->where('id', $id_task);
        })
            ->with('tasks', 'detailReport')
            ->get();

        $data['id_event'] = $id_event;
        $data['id_task'] = $id_task;
        return view('pages.report.tables_report', $data);
    }

    public function view_report_create($id_event, $id_task)
    {
        $data['task'] = Task::find($id_task);
        $data['id_event'] = $id_event;
        $data['task_report'] = $id_task;
        return view('pages.report.report-create', $data);
    }
    public function view_report_update($id_event, $id_task, $id_report)
    {
        $data['report'] = Report::find($id_report);
        $data['task'] = Task::find($id_task);
        $data['id_event'] = $id_event;
        $data['task_report'] = $id_task;
        return view('pages.report.report-update ', $data);
    }

    public function view_report_delete($id_report)
    {
        Report::where('id', $id_report)->delete();

        return redirect()->back();
    }

    public function view_report_detail($id_report)
    {
        $data['id_report'] = $id_report;

        return view('pages.detail_report.report_detail', $data);
    }
    public function report_create(Request $request, $id_event, $id_task)
    {
        $validate = $request->validate([
            'name' => ['required', 'string'],
            'duetime' => ['required',],
        ]);

        if (!$validate) {
            toast('Warning Failed create report', 'warning');

            return redirect()->back();
        }

        $event = Task::find($id_task);

        $report = new Report();
        $report->name = $request->name;
        $report->duetime = $request->duetime;
        $report->tasks_idtask = $id_task;
        $report->save();

        toast('Success Create Report', 'success');

        return redirect('/report/task/' . $id_event . '/' . $id_task);
    }
    public function report_update(Request $request, $id_event, $id_task, $id_report)
    {
        $validate = $request->validate([
            'name' => ['required', 'string'],
            'duetime' => ['required',],
        ]);

        if (!$validate) {
            toast('Warning Failed Update report', 'warning');
            return redirect()->back();
        }

        $report = Report::where('id', $id_report);
        $report->update([
            'name' => $request->name,
            'duetime' => $request->duetime,
            'tasks_idtask' => $id_task,
        ]);

        toast('Success Update Report', 'success');
        return redirect('/report/task/' . $id_event . '/' . $id_task);
    }

    // public function report_detail(Request $request, $id_report)
    // {
    //     $validate = $request->validate([
    //         'description' => ['required', 'string'],
    //         'datetime' => ['required'],
    //         'file_upload' => ['nullable', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:2048'],
    //         'link_file' => ['nullable', 'string'],
    //     ]);

    //     $detailreport = DetailReport::where('id_report', $id_report)->first();

    //     if (!$detailreport) {
    //         $detailreport = new DetailReport();
    //     }

    //     $detailreport->description = $request->description;
    //     $detailreport->datetime = $request->datetime;

    //     if ($request->hasFile('file_upload')) {
    //         $filename = uniqid() . '.' . $request->file('file_upload')->getClientOriginalExtension();
    //         $request->file('file_upload')->storeAs('file', $filename);
    //         $detailreport->file_upload = $filename;
    //     } else {
    //         if ($request->link_file) {
    //             $detailreport->link_file = $request->link_file;
    //         }
    //     }

    //     $detailreport->id_report = $id_report;

    //     $detailreport->save();
    //     toast('Success Upload','success');
    //     return redirect('/member/task');
    // }

    public function view_upload(Request $request, $id_task)
    {
        $reports = Report::find( $id_task );

        // $task = $id_task;

        // echo json_encode($reports);
        return view('pages.detail_report.report_detail', compact('reports'));
    }
    public function view_upload_update(Request $request, $id_task, $id_detail_report)
    {
        $detail = DetailReport::where('id', $id_detail_report)
            ->with('report')
            ->first();

        $reports = Report::where('tasks_idtask', $id_task)
            ->get();

        // $task = Task::find($id_task);


        return view('pages.detail_report.report_detail_update', compact('reports', 'detail'));
    }

    // public function view_member_tables_upload($id_task){
    //     $data['report'] = Report::where('tasks_idtask',$id_task);
    //     // echo json_encode($data);
    //     return view('pages.member.tasks.view_table_upload',$data);
    // }

    public function member_upload(Request $request)
    {
        $validate = $request->validate([
            'description' => ['required', 'string'],
            'datetime' => ['required'],
            'file_upload' => ['nullable', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:2048'],
            'link_file' => ['nullable', 'string'],
        ]);


        $detailreport = new DetailReport();

        $detailreport->description = $request->description;
        $detailreport->datetime = $request->datetime;

        if ($request->hasFile('file_upload')) {
            $filename = uniqid() . '.' . $request->file('file_upload')->getClientOriginalExtension();
            $request->file('file_upload')->storeAs('file', $filename);
            $detailreport->file_upload = $filename;
        } else {
            if ($request->link_file) {
                $detailreport->link_file = $request->link_file;
            }
        }

        $detailreport->id_report = $request->id_report;

        $detailreport->save();
        toast('Success Upload', 'success');
        return redirect('/upload/' . $detailreport->id_report);
    }
    public function member_upload_update(Request $request)
    {
        $validate = $request->validate([
            'description' => ['required', 'string'],
            'datetime' => ['required'],
            'file_upload' => ['nullable', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:2048'],
            'link_file' => ['nullable', 'string'],
        ]);

        // Find the detail report by ID
        $detailreport = DetailReport::find($request->id_detail);

        // Update description and datetime
        $detailreport->description = $request->description;
        $detailreport->datetime = $request->datetime;

        // Check if there is a new file upload
        if ($request->hasFile('file_upload')) {
            // If there is an existing file, delete it from storage
            if ($detailreport->file_upload) {
                Storage::delete('file/' . $detailreport->file_upload);

                $filename = uniqid() . '.' . $request->file('file_upload')->getClientOriginalExtension();
                $request->file('file_upload')->storeAs('file', $filename);
                $detailreport->file_upload = $filename;
            }else {
                $filename = Storage::get('file',$detailreport->upload_file);
                $detailreport->file_upload = $filename;
            }

            // Store the new file
        } else {
            // If no new file is uploaded, check for link_file
            if ($request->link_file) {
                $detailreport->link_file = $request->link_file;
            }
        }

        // Update the report ID
        $detailreport->id_report = $request->id_report;

        // Save the changes
        $detailreport->save();

        // Show success message and redirect
        toast('Success Upload', 'success');
        return redirect('/upload/' . $detailreport->id_report);
    }
}
