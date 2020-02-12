<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PermissionRule extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'permission_rules';

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
    protected $fillable = ['rule_id', 'permission_meta_id'];

    public function rules(){
        return $this->belongsTo(\App\Rule::class, 'rule_id');
    }
    public function permissions(){
        return $this->belongsTo(\App\PermissionMeta::class, 'permission_meta_id');
    }
    public function permissionRoles(){
        return $this->belongsToMany(\App\Role::class, 'role_permission_rule', 'role_id', 'permission_rule_id');
    }
}
