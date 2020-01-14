<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PayrollHistory extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'payroll_histories';

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
    protected $fillable = ['amount', 'date', 'description', 'user_id'];

    public function user(){
        return $this->belongsTo(\App\User::class, 'user_id');
    }

    public function recurringCompensations(){
        return $this->hasMany(\App\RecurringCompensationValue::class, 'payroll_history_id');
    }
}
