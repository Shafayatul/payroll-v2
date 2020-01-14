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

    public function companies(){
        return $this->hasMany(\App\Company::class, 'public_holiday_calendar_id');
    }
    
    public function offices(){
        return $this->hasMany(\App\Office::class, 'public_holiday_calendar_id');
    }
    
    public function company(){
        return $this->belongsTo(\App\Company::class, 'company_id');
    }

    public function holidays(){
        return $this->hasMany(\App\Holiday::class, 'public_holiday_calendar_id');
    }
}
