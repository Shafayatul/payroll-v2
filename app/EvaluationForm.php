<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EvaluationForm extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'evaluation_forms';

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
    protected $fillable = ['name', 'company_id'];

    public function company(){
        return $this->belongsTo(\App\Company::class, 'company_id');
    }
}
