<?php

namespace App\Http\Controllers;

use App\Models\DetailReport;
use App\Models\Report;
use App\Models\Task;
use Illuminate\Http\Request;

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

    public function view_report_create($id_event,$id_task)
    {
        $data['task'] = Task::find( $id_task );
        $data['id_event'] = $id_event;
        $data['task_report'] = $id_task;
        return view('pages.report.report-create', $data);
    }

    public function view_report_delete($id_report){
        Report::where('id',$id_report)->delete();

        return redirect()->back();
    }

    public function view_report_detail($id_report)
    {
        $data['id_report'] = $id_report;

        return view('pages.report.report_detail', $data);
    }
    public function report_create(Request $request,$id_event,$id_task){
        $validate = $request->validate([
            'name'=>['required','string'],
            'duetime'=>['required',],
        ]);

        if (!$validate) {
            return redirect()->back();
        }

        $event = Task::find($id_task);

        $report = new Report();
        $report->name = $request->name;
        $report->duetime = $request->duetime;
        $report->tasks_idtask = $id_task;
        $report->save();


        return redirect('/report/task/'.$id_event.'/'.$id_task);
    }

    public function report_detail_create(Request $request, $id_report) {
        $validate = $request->validate([
            'description' => ['required', 'string'],
            'datetime' => ['required'],
            'file_upload' => ['nullable', 'file', 'mimes:jpg,jpeg,png,pdf', 'max:2048'],
            'link_file' => ['nullable', 'string'],
        ]);

        if (!$validate) {
            return redirect()->back()->with('errors',$validate);
        }

        $detailreport = new DetailReport();
        $detailreport->description = $request->description;
        $detailreport->datetime = $request->datetime;

        if ($request->hasFile('file_upload')) {
            $filename = uniqid() .'.'. $request->file('file_upload')->getClientOriginalExtension();
            $request->file('file_upload')->storeAs('file',$filename);
            $detailreport->file_upload = $filename;
        } else {
            $detailreport->link_file = $request->link_file;
        }
        $detailreport->id_report = $id_report;
        $detailreport->save();

        return redirect('/report');
    }
}
