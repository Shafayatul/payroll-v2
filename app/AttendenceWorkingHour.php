<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttendenceWorkingHour extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'attendence_working_hours';

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
    protected $fillable = ['name', 'is_track_overtime', 'overtime_calculation', 'overtime_cliff', 'deficit_hours', ', is_prorate_vacation', 'reference_value', 'office_id'];

    public function office(){
        return $this->belongsTo(\App\Office::class, 'office_id');
    }
    
    public function weekdays(){
        return $this->hasMany(\App\Weekday::class, 'working_hour_id');
    }

    public function days(){
        $data = [
            'Sunday' => 'Sunday',
            'Monday' => 'Monday',
            'Tuesday' => 'Tuesday',
            'Wednesday' => 'Wednesday',
            'Thursday' => 'Thursday',
            'Friday' => 'Friday',
            'Saturday' => 'Saturday',
        ];

        return $data;
    }
}
