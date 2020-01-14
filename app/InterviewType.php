<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InterviewType extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'interview_types';

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
    protected $fillable = ['name', 'sort_order'];

    public function office(){
        return $this->belongsTo(\App\Office::class, 'office_id');
    }
}
