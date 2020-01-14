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

    public function office(){
        return $this->belongsTo(\App\Office::class, 'office_id');
    }
}
