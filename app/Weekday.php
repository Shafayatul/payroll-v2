<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Weekday extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'weekdays';

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
    protected $fillable = ['weekday', 'working_hours', 'start_time', 'end_time', 'break_time', 'is_active', 'working_hour_id'];

    public function attendenceWorkingHour(){
        return $this->belongsTo(\App\AttendenceWorkingHour::class, 'working_hour_id');
    }

    public function userAttendances(){
        return $this->belongsToMany(\App\User::class, 'user_attendance', 'weekday_id', 'user_id')->withPivot('in_time', 'out_time', 'date', );
    }

    public function attendanceLists(){
        return $this->hasMany(\App\Attendance::class, 'weekday_id');
    }
}
