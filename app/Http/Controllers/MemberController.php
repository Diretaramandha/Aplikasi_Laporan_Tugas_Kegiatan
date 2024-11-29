<?php

namespace App\Http\Controllers;

use App\Models\DetailReport;
use App\Models\Member;
use App\Models\Report;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    public function member()
    {
        $data['member'] = Member::with('tasks', 'user')->get();

        // echo json_encode( $data );
        return view("pages.member.view_member", $data);
    }

    public function view_member_create()
    {
        $data['users'] = User::where('level', 'member')
            ->whereDoesntHave('member') // Pastikan relasi 'member' sudah didefinisikan di model User
            ->get();

        $data['tasks'] = Task::with('member') // Mengambil relasi task
            ->whereDoesntHave('member')
            ->get();
        // $data['tasks'] = Report::with('tasks.member')->get();

        // echo json_encode($data['tasks']);
        return view("pages.member.create", $data);
    }
    public function view_task_member()
    {
        $user = Auth::user();
        $data['member'] = Member::where('user_id', $user->id)
            ->with('user', 'tasks')
            ->get();

        return view('pages.member.tasks.view_tasks_member', $data);
    }
    public function view_task_member_detail($id_event, $id_task)
    {
        $user = Auth::user();
        $data['tasks'] = Report::where('tasks_idtask', $id_task)
            ->whereHas('tasks.member', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })
            ->get();
        // $data['id_report'] = Report::where('tasks_idtask', $id_task)
        // ->whereHas('tasks.member', function ($query) use ($user) {
        //     $query->where('user_id', $user->id);
        // })
        // ->get();

        return view('pages.member.tasks.view_tasks_upload', $data);
    }
    public function view_member_upload($id_report)
    {
        // $task = $id_task ;
        $users = User::latest()->paginate(10);


        $report = Report::find($id_report);
        $upload = DetailReport::where('id_report', $id_report)->get();

        return view('pages.member.tasks.view_table_upload', compact('upload', 'report'));
    }


    public function view_member_update($id_member)
    {
        $data['member'] = Member::findOrFail($id_member);
        $data['users'] = User::where('level', 'member')->get();
        $data['tasks'] = Report::with('tasks')->whereHas('tasks', function ($query) {
            // $query->whereDoesntHave('member');
        })->get();

        return view("pages.member.update", $data);
    }
    public function view_delete_upload(Request $request)
    {
        DetailReport::where("id", $request->id_detail)->delete();
        alert()->success('SuccessAlert', 'Lorem ipsum dolor sit amet.');
        return redirect()->back();
    }
    public function member_delete($id_member)
    {
        Member::destroy($id_member);
        toast('Success Delete Member', 'success');
        return redirect("/member");
    }
    public function member_update(Request $request, $id_member)
    {
        $create = $request->validate([
            'user_id' => ['required'],
            'task_id' => ['required'],
        ]);
        if (!$create) {
            toast('Failed Create Member', 'warning');
            return redirect()->back();
        }
        $member = Member::where('id', $id_member)->first();
        $member->update([
            'user_id' => $request->user_id,
            'task_id' => $request->task_id,
        ]);

        toast('Success Create Member', 'success');
        return redirect('/member');
    }
    public function member_create(Request $request)
    {
        $create = $request->validate([
            'user_id' => ['required'],
            'task_id' => ['required'],
        ]);
        if (!$create) {
            toast('Failed Create Member', 'warning');
            return redirect()->back();
        }
        $member = new Member();
        $member->user_id = $request->user_id;
        $member->task_id = $request->task_id;
        $member->save();

        toast('Success Create Member', 'success');
        return redirect('/member');
    }
}
