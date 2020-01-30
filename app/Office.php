<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'offices';

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
    protected $fillable = ['name', 'currency', 'timezone', 'street', 'city', 'state', 'zip', 'country', 'public_holiday_calendar_id', 'company_id'];

    public function calendar(){
        return $this->belongsTo(\App\PublicHolidayCalendar::class, 'public_holiday_calendar_id');
    }

    public function absences()
    {
        return $this->hasMany(\App\Absence::class, 'office_id');
    }

    public function absenceCalendars()
    {
        return $this->hasMany(\App\Calendar::class, 'office_id');
    }

    public function company(){
        return $this->belongsTo(\App\Company::class, 'company_id');
    }

    public function users(){
        return $this->hasMany(\App\User::class, 'office_id');
    }

    public function feedbackCategories(){
        return $this->hasMany(\App\FeedbackCategory::class, 'office_id');
    }

    public function departments(){
        return $this->hasMany(\App\Department::class, 'office_id');
    }

    public function interviewTypes(){
        return $this->hasMany(\App\InterviewType::class, 'office_id');
    }
    
    public function smtps(){
        return $this->hasMany(\App\Smtp::class, 'office_id');
    }

    public function costs(){
        return $this->hasMany(\App\CostCenter::class, 'office_id');
    }

    public function recruitingPhases(){
        return $this->hasMany(\App\RecruitingPhase::class, 'office_id');
    }

    public function attendenceWorkingHours(){
        return $this->hasMany(\App\AttendenceWorkingHour::class, 'office_id');
    }

    public function payrollSettings(){
        return $this->hasMany(\App\PayrollSetting::class, 'office_id');
    }
}