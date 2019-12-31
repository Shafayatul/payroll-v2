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
    protected $fillable = ['name', 'currency', 'timezone', 'street', 'city', 'state', 'zip', 'country', 'public_holiday_id', 'company_id'];

    
}
