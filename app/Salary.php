<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Traits\keyFunctionTrait;

class Salary extends Model
{
    use keyFunctionTrait;
    /**
     * The database table used by the model.
     *
     * @var string
     */

    protected $table = 'salaries';

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
     
    protected $fillable = ['get_salary_month', 'date', 'total', 'complements', 'advantage', 'unemployment', 'is_paid', 'user_id', 'office_id'];

    public function offices(){
        return $this->belongsTo(\App\Office::class, 'office_id');
    }

    public function employees(){
        return $this->belongsTo(\App\User::class, 'user_id');
    }

    public function compensations(){
        return $this->belongsToMany(\App\Compensation::class, 'salary_compensation', 'salary_id', 'compensation_id')->withPivot('amount');
    }

    public function contributions(){
        return $this->belongsToMany(\App\Contribution::class, 'salary_contribution', 'salary_id', 'contribution_id')->withPivot('amount');
    }
}
