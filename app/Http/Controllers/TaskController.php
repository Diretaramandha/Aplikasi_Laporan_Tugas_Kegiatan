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
        toast('Failed Create Task', 'warning');
            return redirect()->back();
        }

        $task = new Task();
        $task->name = $request->name;
        $task->description = $request->description;
        $task->id_event = $id;
        $task->tasks_idtask = null;
        $task->save();

        toast('Success Create Task', 'success');
        return redirect('/task/'. $task->id_event.'/sub-task/'.$task->id.'/create');
     }

     public function task_update(Request $request,$id_event,$id){
        $validate = Validator::make($request->all(),[
            'name' => ['required'],
            'description' => ['required'],
        ]);

        if ($validate->fails()) {
            toast('Failed Update Task', 'warning');
            return redirect()->back();
        }

        $task = Task::find($id);
        $task->update([
            'name'=> $request->name,
            'description'=> $request->description,
            'id_event'=> $id_event,
            'tasks_idtask'=> null,
        ]);

        toast('Success Update Task', 'success');
        return redirect('/task/'.$id_event);
     }
     public function sub_task_create(Request $request,$id_event,$id){
        $validate = Validator::make($request->all(),[
            'name' => ['required'],
            'description' => ['required'],
        ]);

        if ($validate->fails()) {
            toast('Failed create Task', 'warning');
            return redirect()->back();
        }

        $task = new Task();
        $task->name = $request->name;
        $task->description = $request->description;
        $task->id_event = $id_event;
        $task->tasks_idtask = $id;
        $task->save();

        toast('Success Create Task', 'success');
        return redirect('/report/create/'.$task->id);
     }
     public function sub_task_update(Request $request,$id_event,$id_task,$id){
        $validate = Validator::make($request->all(),[
            'name' => ['required'],
            'description' => ['required'],
        ]);

        if ($validate->fails()) {
            toast('Failed Update Task', 'warning');
            return redirect()->back();
        }

        $task = Task::find($id);
        $task->update([
            'name'=> $request->name,
            'description'=> $request->description,
            'id_event'=> $id_event,
            'tasks_idtask'=> $id_task,
        ]);

        toast('Success Update Task', 'success');
        return redirect('/task/'.$id_event.'/sub-task/'.$id_task);
     }
}
