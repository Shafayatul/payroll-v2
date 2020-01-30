<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Calendar extends Model
{
    use SoftDeletes;
    
    public function absences()
    {
        return $this->belongsTo(\App\Absence::class, 'absence_id');
    }
}
