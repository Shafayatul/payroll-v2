<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PublicHolidayCalendar extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'public_holiday_calendars';

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
    protected $fillable = ['name', 'type', 'office_id'];

    
}
