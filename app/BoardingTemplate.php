<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\keyfunctiontrait;

class BoardingTemplate extends Model
{
    use keyfunctiontrait;
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'boarding_templates';

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
    protected $fillable = ['name', 'type', 'company_id', 'office_id'];

    public function company(){
        return $this->belongsTo(\App\Company::class, 'company_id');
    }

    public function boardingTemplateStep(){
        return $this->belongsToMany(\App\BoardingStep::class, 'boarding_template_step', 'boarding_template_id', 'boarding_step_id')->withPivot('is_ingroup', 'days', 'hire_type', 'responsible');
    }
}
