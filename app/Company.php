<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\PublicHolidayCalendar;

class Company extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'companies';

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
    protected $fillable = ['name', 'is_sub_company_enable', 'is_email_notification_enable', 'language', 'currency', 'industry_id', 'timezone', 'public_holiday_id', 'maintenance_emails', 'logo'];

    public function industry(){
        return $this->belongsTo(\App\Industry::class, 'industry_id');
    }

    public function user(){
        return $this->belongsTo(\App\User::class, 'user_id');
    }

    public function calendar(){
        return $this->belongsTo(PublicHolidayCalendar::class, 'public_holiday_calendar_id');
    }

    public function publicHolidays(){
        return $this->hasMany(PublicHolidayCalendar::class, 'company_id');
    }

    public function offices(){
        return $this->hasMany(\App\Office::class, 'company_id');
    }

    public function payrollGroups(){
        return $this->hasMany(\App\PayrollGroup::class, 'company_id');
    }

    public function boardingTemplates(){
        return $this->hasMany(\App\BoardingTemplate::class, 'company_id');
    }

    public function recurringCompensationTypes(){
        return $this->hasMany(\App\RecurringCompensationType::class, 'company_id');
    }

    public function employeeInformationSections(){
        return $this->hasMany(\App\EmployeeInformationSection::class, 'company_id');
    }

    public function recuritingSettings(){
        return $this->hasMany(\App\RecuritingSetting::class, 'company_id');
    }

    public function formSections(){
        return $this->hasMany(\App\FormSection::class, 'company_id');
    }

    public function evaluationForms(){
        return $this->hasMany(\App\EvaluationForm::class, 'company_id');
    }
}
