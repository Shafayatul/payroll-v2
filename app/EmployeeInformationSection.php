<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeInformationSection extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'employee_information_sections';

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
    protected $fillable = ['name', 'type', 'company_id'];

    public function company(){
        return $this->belongsTo(\App\Company::class, 'company_id');
    }

    public function employeeDetailAttributes(){
        return $this->hasMany(\App\Company::class, 'section_id');
    }
}
