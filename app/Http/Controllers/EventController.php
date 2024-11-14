<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function event_create(Request $request){
        $validate = $request->validate([
            'name'=> ['required'],
            'description'=> ['required','string'],
            'date'=> ['required','date'],
        ]);

        if (!$validate) {
            return redirect()->back();
        }

        $event = new Event();
        $event->name = $request->name;
        $event->description = $request->description;
        $event->date = $request->date;
        $event->save();

        return redirect('/task/'. $event->id);
    }
}
