<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Task;
use Illuminate\Http\Request;

class calculateEventProgress extends Controller
{
    // public function calculateEventProgress(Event $event)
    // {
    //     // Get all tasks associated with the event
    //     $tasks = Task::where('event_id', $event->id)->get();

    //     // Initialize total progress and total tasks
    //     $totalProgress = 0;
    //     $totalTasks = $tasks->count();

    //     // Calculate the progress for each task
    //     foreach ($tasks as $task) {
    //         $totalProgress += $task->progress; // Assuming 'progress' is the field storing task progress
    //     }

    //     // Calculate the overall event progress
    //     if ($totalTasks > 0) {
    //         $eventProgress = ($totalProgress / $totalTasks) * 100;
    //     } else {
    //         $eventProgress = 0;
    //     }

    //     return round($eventProgress);
    // }
}
