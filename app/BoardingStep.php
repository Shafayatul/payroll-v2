<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BoardingStep extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'boarding_steps';

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
    protected $fillable = ['name', 'type'];

    public function stepItems(){
        return $this->belongsTo(\App\BoardingStepItem::class, 'boarding_step_id');
    }
}
