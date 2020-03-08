<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user_attendance';

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
     
    protected $fillable = ['in_time', 'out_time', 'date', 'user_id', 'weekday_id'];

    public function employees(){
        return $this->belongsTo(\App\User::class, 'user_id');
    }
    
    public function weekdays(){
        return $this->belongsTo(\App\Weekday::class, 'weekday_id');
    }
}