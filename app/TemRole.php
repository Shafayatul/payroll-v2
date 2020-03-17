<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Traits\keyFunctionTrait;

class TemRole extends Model
{
    use keyFunctionTrait;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tem_roles';

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

    public function permissions(){
        return $this->belongsToMany(\App\TemPermission::class, 'roles_tem_permissions', 'role_id', 'permission_id');
    }

    public function users(){
        return $this->belongsToMany(\App\User::class, 'users_tem_roles', 'role_id', 'user_id');
    }
}