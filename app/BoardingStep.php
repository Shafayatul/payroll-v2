<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\keyfunctiontrait;

class BoardingStep extends Model
{
    use keyfunctiontrait;
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
    protected $fillable = ['name', 'type', 'boarding_type'];

    public function stepItems(){
        return $this->hasMany(\App\BoardingStepItem::class, 'boarding_step_id');
    }

    public function boardingTemplateStep(){
        return $this->belongsToMany(\App\BoardingTemplate::class, 'boarding_template_step', 'boarding_step_id', 'boarding_template_id')->withPivot('is_ingroup', 'days', 'hire_type', 'responsible');
    } 
}
