<?php

namespace App\Http\Controllers;

use App\Models\Report;
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

        $report = new Report();
        $report->name = $request->name;
        $report->duetime = $request->duetime;
        $report->tasks_idtask = $id_task;
        $report->save();

        return redirect('/report/'. $id_task.'/upload/'.$report->id);
    }
}
