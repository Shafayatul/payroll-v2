<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecruitingPhase extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'recruiting_phases';

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
    protected $fillable = ['name', 'type', 'color', 'max_days_in_phase', 'office_id'];

    public function office(){
        return $this->belongsTo(\App\Office::class, 'office_id');
    }
}
