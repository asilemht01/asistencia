<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    use HasFactory;

    public function practicante()
    {
        return $this->belongsTo('App\Models\Practicante', 'practicante_id','id');
    }
}
