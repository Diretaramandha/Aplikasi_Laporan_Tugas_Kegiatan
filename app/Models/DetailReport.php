<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailReport extends Model
{
    use HasFactory;

    public function report()
    {
        return $this->belongsTo(Report::class, 'id_report');
    }
    // Model DetailReport.php
    public function task()
    {
        return $this->belongsTo(Task::class, 'task_id'); // Pastikan 'task_id' sesuai dengan nama kolom di tabel
    }
}
