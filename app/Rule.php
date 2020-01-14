<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'rules';

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
    protected $fillable = ['characteristic', 'value', 'attribute_id'];

    public function attributes(){
        return $this->belongsTo(\App\EmployeeDetailAttribute::class, 'attribute_id');
    }
}
