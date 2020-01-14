<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SpecialRoleReminder extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'special_role_reminders';

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
    protected $fillable = ['value', 'role_reminder_id', 'attribute_id'];

    public function roleReminder(){
        return $this->belongsTo(\App\RoleReminder::class, 'role_reminder_id');
    }

    public function attributes(){
        return $this->belongsTo(\App\EmployeeDetailAttribute::class, 'attribute_id');
    }
}
