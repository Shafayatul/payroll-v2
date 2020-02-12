<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Traits\keyFunctionTrait;

class Role extends Model
{
    use keyFunctionTrait;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'roles';

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
    protected $fillable = ['name', 'slug', 'office_id'];

    public function offices(){
        return $this->belongsTo(\App\Office::class, 'office_id');
    }

    public function users(){
        return $this->belongsToMany(\App\User::class, 'role_user', 'user_id', 'role_id');
    }

    public function reminders(){
        return $this->hasMany(\App\RoleReminder::class, 'role_id');
    }

    // public function permissionRoles(){
    //     return $this->belongsToMany(\App\PermissionRule::class, 'role_permission_rule', 'role_id', 'permission_rule_id');
    // }

    public function permissions(){
        return $this->belongsToMany(\App\Permission::class, 'permission_role', 'role_id', 'permission_id');
    }

}
