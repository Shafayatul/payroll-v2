<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecurringCompensationType extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'recurring_compensation_types';

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
    protected $fillable = ['name', 'is_system_type', 'company_id'];

    public function company(){
        return $this->belongsTo(\App\Company::class, 'company_id');
    }
    
    public function recurringCompensations(){
        return $this->hasMany(\App\RecurringCompensationValue::class, 'compensation_type_id');
    }
}
