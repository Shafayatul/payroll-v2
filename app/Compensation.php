<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Traits\keyFunctionTrait;

class Compensation extends Model
{
    use keyFunctionTrait;
    /**
     * The database table used by the model.
     *
     * @var string
     */

    protected $table = 'compensations';

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
     
    protected $fillable = ['type', 'increase', 'office_id'];

    public function offices(){
        return $this->belongsTo(\App\Office::class, 'office_id');
    }

    public function salaries(){
        return $this->belongsToMany(\App\Salary::class, 'salary_compensation', 'compensation_id', 'salary_id')->withPivot('amount');
    }
}
