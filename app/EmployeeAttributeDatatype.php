<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Traits\keyFunctionTrait;


class EmployeeAttributeDatatype extends Model
{
    use SoftDeletes, keyFunctionTrait;

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

    public function attributeOptions(){
        return $this->hasMany(\App\AttributeTypeOptions::class, 'attribute_datatype_id');
    }
}
