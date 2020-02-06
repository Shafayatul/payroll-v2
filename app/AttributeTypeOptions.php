<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttributeTypeOptions extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'attribute_type_options';

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
    protected $fillable = ['name', 'attribute_datatype_id'];

    public function datatype(){
        return $this->belongsTo(\App\EmployeeAttributeDatatype::class, 'attribute_datatype_id');
    }
}
