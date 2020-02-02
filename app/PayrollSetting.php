<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PayrollSetting extends Model
{
        /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'payroll_settings';

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
    protected $fillable = ['review_reminder_on', 'is_separate', 'prorate_salary_calculation', 'office_id'];

    public function prorateSalaryType()
    {
        $data = [
            '30-days' => 'Based on 30 days',
            'month-days' => 'Based on days of month',
        ];
        return $data;
    }

    public function office(){
        return $this->belongsTo(\App\Office::class, 'office_id');
    }

    public function absences()
    {
        return $this->belongsToMany(\App\Absence::class, 'absences_type_payroll_settings', 'payroll_setting_id', 'absence_id');
    }

    public function attributes()
    {
        return $this->belongsToMany(\App\EmployeeDetailAttribute::class, 'attributes_in_personal_data_sheets', 'payroll_setting_id', 'attribute_id');
    }
}
