<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Traits\keyFunctionTrait;
class EmployeeInformationSection extends Model
{
    use SoftDeletes, keyFunctionTrait;
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
        return $this->hasMany(\App\EmployeeDetailAttribute::class, 'section_id');
    }
}
