<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailReport extends Model
{
    use HasFactory;

    public function report(){
        return $this->belongsTo(Report::class,'id_report');
    }
}
