<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CalendarHoliday extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'calendar_holidays';

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
    protected $fillable = ['name', 'details', 'is_halfday', 'calendar_year_id'];

    public function calendarYears(){
        return $this->belongsTo(\App\CalendarYear::class, 'calendar_year_id');
    }

}
