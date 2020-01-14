<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeAttributeDatatype extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'employee_attribute_datatypes';

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
    protected $fillable = ['name', 'key', 'attribute_id'];

    public function attribute(){
        return $this->belongsTo(\App\EmployeeDetailAttribute::class, 'attribute_id');
    }

    public function attributeMetas(){
        return $this->hasMany(\App\EmployeeAttributeMeta::class, 'attribute_datatype_id');
    }
}
