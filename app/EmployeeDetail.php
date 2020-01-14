<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeDetail extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'employee_details';

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
    protected $fillable = ['value', 'user_id', 'attribute_id'];

    public function user(){
        return $this->belongsTo(\App\User::class, 'user_id');
    }
    public function attribute(){
        return $this->belongsTo(\App\EmployeeDetailAttribute::class, 'attribute_id');
    }
}
