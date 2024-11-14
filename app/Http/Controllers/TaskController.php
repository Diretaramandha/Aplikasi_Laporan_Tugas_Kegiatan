<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function task_create(Request $request,$id){
        $validate = Validator::make($request->all(),[
            'name' => ['required'],
            'description' => ['required'],
        ]);

        if ($validate->fails()) {
            return redirect()->back();
        }

        $task = new Task();
        $task->name = $request->name;
        $task->description = $request->description;
        $task->id_event = $id;
        $task->tasks_idtask = '';
        $task->save();

        return redirect('/event');
     }
}
