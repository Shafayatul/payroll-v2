<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CalendarYear extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'calendar_years';

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
    protected $fillable = ['year', 'calendar_id'];

    public function calendars(){
        return $this->belongsTo(\App\PublicHolidayCalendar::class, 'calendar_id');
    }

    public function holidays(){
        return $this->hasMany(\App\CalendarHoliday::class, 'calendar_year_id');
    }
}
