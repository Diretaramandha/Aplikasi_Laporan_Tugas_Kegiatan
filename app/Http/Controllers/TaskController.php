<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function view_task($id)
    {
        $data['task'] = Task::with(['event','member.user'])
            ->where('id_event', $id)
            ->whereNull('tasks_idtask')
            ->get();

        $data['id'] = $id;
        // echo json_encode($data['task']);
        return view("pages.Task.task", $data);
    }

    public function view_task_create($id)
    {
        $data['event'] = Event::findOrFail($id);
        return view('pages.Task.create', $data);
    }

    public function view_task_update($id_event, $id)
    {
        $data['task'] = Task::with(relations: 'event')->findOrFail($id);
        return view('pages.Task.update', $data);
    }

    public function view_task_delete($id_event, $id)
    {
        Task::destroy($id);
        return redirect('/task/' . $id_event);
    }

    public function view_sub_task($id_event, $id)
    {
        $data['sub_task'] = Task::with('event','member')
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
    public function task_create(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
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
        return redirect('/task/' . $task->id_event );
    }

    public function task_update(Request $request, $id_event, $id)
    {
        $validate = Validator::make($request->all(), [
            'name' => ['required'],
            'description' => ['required'],
        ]);

        if ($validate->fails()) {
            toast('Failed Update Task', 'warning');
            return redirect()->back();
        }

        $task = Task::find($id);
        $task->update([
            'name' => $request->name,
            'description' => $request->description,
            'id_event' => $id_event,
            'tasks_idtask' => null,
        ]);

        toast('Success Update Task', 'success');
        return redirect('/task/' . $id_event);
    }
    public function sub_task_create(Request $request, $id_event, $id)
    {
        $validate = Validator::make($request->all(), [
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
        return redirect('/task/'.$id_event.'/sub-task/'. $task->id);
    }
    public function sub_task_update(Request $request, $id_event, $id_task, $id)
    {
        $validate = Validator::make($request->all(), [
            'name' => ['required'],
            'description' => ['required'],
        ]);

        if ($validate->fails()) {
            toast('Failed Update Task', 'warning');
            return redirect()->back();
        }

        $task = Task::find($id);
        $task->update([
            'name' => $request->name,
            'description' => $request->description,
            'id_event' => $id_event,
            'tasks_idtask' => $id_task,
        ]);

        toast('Success Update Task', 'success');
        return redirect('/task/' . $id_event . '/sub-task/' . $id_task);
    }
}
