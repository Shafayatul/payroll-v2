<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PayrollGroup extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'payroll_groups';

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
    protected $fillable = ['company_id', 'name', 'type', 'val_id', 'start', 'end', 'start_from'];

    
}
