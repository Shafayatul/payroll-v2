<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Traits\keyFunctionTrait;

class BoardingGroup extends Model
{
    use keyfunctiontrait;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'boarding_groups';

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
    protected $fillable = ['name', 'office_id'];

    public function offices(){
        return $this->belongsTo(\App\Office::class, 'office_id');
    }

    public function employees(){
        return $this->belongsToMany(\App\User::class, 'employee_boarding_group', 'user_id', 'group_id');
    }
}
