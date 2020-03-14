<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Traits\keyFunctionTrait;

class OvertimeCompensation extends Model
{
    use keyFunctionTrait;
    /**
     * The database table used by the model.
     *
     * @var string
     */

    protected $table = 'compensations';

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
     
    protected $fillable = ['type', 'compensatory', 'increase', 'office_id'];

    public function offices(){
        return $this->belongsTo(\App\Office::class, 'office_id');
    }

    
}
