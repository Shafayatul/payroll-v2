<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeDetailAttribute extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'employee_detail_attributes';

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
    protected $fillable = ['name', 'is_unique', 'section_id'];

    public function employeeInformationSection(){
        return $this->belongsTo(\App\EmployeeInformationSection::class, 'section_id');
    }

    public function employeeDetails(){
        return $this->hasMany(\App\EmployeeDetail::class, 'attribute_id');
    }

    public function datatypes(){
        return $this->hasMany(\App\EmployeeAttributeDatatype::class, 'attribute_id');
    }

    public function rules(){
        return $this->hasMany(\App\Rule::class, 'attribute_id');
    }
}
