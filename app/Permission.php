<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Traits\keyFunctionTrait;

class Permission extends Model
{
    use keyFunctionTrait;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'permissions';

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
    protected $fillable = ['permission_meta', 'permission_key', 'rule_id', 'access_type'];

    public function rules(){
        return $this->belongsTo(\App\Rule::class, 'rule_id');
    }

    public function roles(){
        return $this->belongsToMany(\App\Role::class, 'permission_role', 'permission_id', 'role_id');
    }
}
