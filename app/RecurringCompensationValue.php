<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecurringCompensationValue extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'recurring_compensation_values';

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
    protected $fillable = ['value', 'payroll_history_id', 'compensation_type_id'];

    public function payrollHistory(){
        return $this->belongsTo(\App\PayrollHistory::class, 'payroll_history_id');
    }

    public function compensationType(){
        return $this->belongsTo(\App\RecurringCompensationType::class, 'compensation_type_id');
    }
}
