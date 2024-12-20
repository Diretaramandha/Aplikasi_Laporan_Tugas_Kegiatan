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
    public function member()
    {
        return $this->hasMany(Member::class,'task_id');
    }

    public function report()
    {
        return $this->hasMany(Report::class,'tasks_idtask');
    }

}
