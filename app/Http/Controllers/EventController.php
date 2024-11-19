<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function event_create(Request $request){
        $validate = $request->validate([
            'name'=> ['required'],
            'description'=> ['required','string'],
            'date'=> ['required','date'],
        ]);

        if (!$validate) {
            toast('Failed Create Event','Warning');
            return redirect()->back();
        }
        $user = Auth::user();
        $event = new Event();
        $event->name = $request->name;
        $event->description = $request->description;
        $event->date = $request->date;
        $event->create_by = $user->id;
        $event->save();

        toast('Success Create Event','success');
        return redirect('/task/create/'. $event->id);
    }
    public function event_update($id,Request $request){
        $validate = $request->validate([
            'name'=> ['required'],
            'description'=> ['required','string'],
            'date'=> ['required','date'],
        ]);

        if (!$validate) {
            toast('Failed Update Event','warning');
            return redirect()->back();
        }

        $event = Event::where('id', $id)->first();
        $user = Auth::user();

        $event->update([
            'name'=> $request->name,
            'description'=> $request->description,
            'date'=> $request->date,
            'create_by'=>$user->id,
        ]);

        toast('Success Update Event','success');
        return redirect('/event');
    }
}
