<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function event()
    {
        return $this->belongsTo(Event::class, 'id_event');
    }
    public function tasks()
    {
        return $this->hasMany(Task::class, 'tasks_idtask');
    }
    public function subTask()
    {
        return $this->belongsTo(Task::class, 'tasks_idtask');
    }
    public function report()
    {
        return $this->belongsTo(Report::class, 'tasks_idtask');
    }
    public function calculateProgress()
    {
        $subTasks = $this->tasks; // Ambil semua sub-tasks
        if ($subTasks->isEmpty()) {
            return 0; // Jika tidak ada sub-tasks, progress 0%
        }

        $totalProgress = $subTasks->sum('progress'); // Jumlahkan semua progress sub-tasks
        $totalCount = $subTasks->count(); // Hitung jumlah sub-tasks

        return round($totalProgress / $totalCount); // Hitung rata-rata progress
    }
}
