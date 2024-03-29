<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'departments';

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
    protected $fillable = ['name', 'working_hour', 'office_id'];

    public function office(){
        return $this->belongsTo(\App\Office::class, 'office_id');
    }
    
    public function users(){
        return $this->hasMany(\App\User::class, 'department_id');
    }

    public function workingHours()
    {
        return 40;
    }
}
