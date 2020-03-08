<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAbsence extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user_absence';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
     
    protected $fillable = ['absence_from', 'absence_to', 'user_id', 'absence_id'];

    public function employees(){
        return $this->belongsTo(\App\User::class, 'user_id');
    }
    
    public function absences(){
        return $this->belongsTo(\App\Absence::class, 'absence_id');
    }
}
