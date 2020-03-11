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
     
    protected $fillable = ['get_salary_month', 'month', 'complements', 'advantage', 'unemployment', 'user_id', 'office_id'];

    public function offices(){
        return $this->belongsTo(\App\Office::class, 'office_id');
    }

    public function employees(){
        return $this->belongsTo(\App\User::class, 'user_id');
    }
}
