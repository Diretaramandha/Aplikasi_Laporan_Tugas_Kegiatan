<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public function event(){
        return $this->belongsTo(Event::class,'id_event');
    }

    public function sub_task(){
        return $this->belongsTo(Task::class,'task_idtask');
    }
    public function main_task(){
        return $this->hasMany(Task::class,'task_idtask');
    }
}
