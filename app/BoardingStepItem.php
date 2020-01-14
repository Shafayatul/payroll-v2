<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BoardingStepItem extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'boarding_step_items';

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
    protected $fillable = ['type_key', 'type_name', 'type_icon', 'value', 'is_required', 'boarding_step_id'];

    public function boardingStep(){
        return $this->belongsTo(\App\BoardingStep::class, 'boarding_step_id');
    } 

}
