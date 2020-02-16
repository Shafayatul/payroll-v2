<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\keyFunctionTrait;

class RoleReminder extends Model
{
    use SoftDeletes, keyFunctionTrait;
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'role_reminders';

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
    protected $fillable = ['remind_key', 'about_key', 'filter_type', 'automatic_offset', 'automatic_offset_unit', 'automatic_offset_sign', 'reminder_type', 'is_yearly', 'title', 'role_id'];

    public function role(){
        return $this->belongsTo(\App\Role::class, 'role_id');
    }
    public function reminds(){
        return $this->belongsTo(\App\Role::class, 'remind_key');
    }

    public function specialrole(){
        return $this->hasMany(\App\SpecialRoleReminder::class, 'role_reminder_id');
    }
}
