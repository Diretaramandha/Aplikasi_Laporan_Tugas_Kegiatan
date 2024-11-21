<?php

namespace App\Http\Controllers;

use App\Models\DetailReport;
use App\Models\Report;
use App\Models\Task;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function report_create(Request $request,$id_task){
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


        return redirect('/task/'.$event->event->id.'/sub-task/'.$event->tasks_idtask);
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
