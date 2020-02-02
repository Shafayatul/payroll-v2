<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Office;

class Absence extends Model
{
    public function defaultColor()
    {
        return '#aaaaaa';
    }

    public function validOnData()
    {
        $data = [
            '' => 'Please Select...',
            'Work Schedule on Mon-Fri' => 'Work Schedule on Mon-Fri',
            'Work Schedule on Mon-Sat' => 'Work Schedule on Mon-Sat',
            'Work Schedule, incl. Holidays' => 'Work Schedule, incl. Holidays',
            'Work Schedule, excl. Holidays' => 'Work Schedule, excl. Holidays',
            'Mon-Sun' => 'Mon-Sun',
        ];
        return $data;
    }

    public function carryoverType()
    {
        $types = [
            '' => 'Please Select...',
            'limited' => 'Limited carryover',
            'unlimited' => 'Unlimited carryover',
            'none' => 'No carryover',
        ];
        return $types;
    }

    public function offieces()
    {
        return $this->belongsTo(Office::class, 'office_id');
    }

    public function absenceCalendars()
    {
        return $this->hasMany(\App\Calendar::class, 'absence_id');
    }

    public function payrollSettings()
    {
        return $this->belongsToMany(\App\PayrollSetting::class, 'absences_type_payroll_settings', 'absence_id', 'payroll_setting_id');
    }
}
