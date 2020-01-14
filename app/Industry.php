<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Company;

class Industry extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'industries';

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
    protected $fillable = ['name'];

    public function companies(){
        return $this->hasMany(Company::class, 'industry_id');
    }
    
}
