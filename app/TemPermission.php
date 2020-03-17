<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Traits\keyFunctionTrait;

class TemPermission extends Model
{
    use keyFunctionTrait;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tem_permissions';

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
    protected $fillable = ['slug', 'name'];

    public function roles(){
        return $this->belongsToMany(\App\TemRole::class, 'roles_tem_permissions', 'permission_id', 'role_id');
    }
}
