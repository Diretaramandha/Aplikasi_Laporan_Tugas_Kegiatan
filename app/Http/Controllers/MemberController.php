<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Report;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

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

        $data['tasks'] = Report::with('tasks') // Mengambil relasi task
            ->whereHas('tasks', function ($query) {
                $query->whereDoesntHave('member'); // Mengambil tugas yang tidak memiliki relasi dengan members
            })
            ->get();

        // echo json_encode($data['tasks']);
        return view("pages.member.create", $data);
    }
    public function view_member_update($id_member)
    {

            $data['member'] = Member::with(['user', 'tasks.report'])
                ->where('id', $id_member)
                ->first();

        // Ambil semua pengguna yang memiliki level 'member' dan tidak memiliki relasi 'member'
        $data['users'] = User::where('level', 'member')
            ->whereDoesntHave('member') // Pastikan relasi 'member' sudah didefinisikan di model User
            ->get();

        // Ambil semua tugas yang tidak memiliki anggota
        $data['tasks'] = Report::with('tasks') // Mengambil relasi task
            ->whereHas('tasks', function ($query) {
                $query->whereDoesntHave('member'); // Mengambil tugas yang tidak memiliki relasi dengan members
            })
            ->get();

        echo json_encode($data);
        // return view("pages.member.update", $data);
    }
    public function member_delete($id_member)
    {
        Member::destroy($id_member);
        toast('Success Delete Member', 'success');
        return redirect("/member");
    }
    public function member_update(Request $request)
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
