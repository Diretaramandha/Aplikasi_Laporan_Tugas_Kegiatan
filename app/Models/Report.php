<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

   public function tasks(){
    return $this->belongsTo(Task::class,'tasks_idtask');
   }

   public function detailReport(){
    return $this->hasMany(DetailReport::class,'id_report');
   }
}
