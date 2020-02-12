<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Traits\keyFunctionTrait;

class PermissionMeta extends Model
{
    use keyFunctionTrait;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'permission_metas';

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
    protected $fillable = ['permission_meta', 'permission_key', 'access_type'];

    public function permissionRules(){
        return $this->belongsToMany(\App\Rule::class, 'permission_rule', 'rule_id', 'permission_meta_id');
    }
}
