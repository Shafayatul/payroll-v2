<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Smtp extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'smtp_settings';

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
    protected $fillable = ['host', 'port', 'encrypt_type', 'username', 'password', 'office_id'];

    public function office(){
        return $this->belongsTo(\App\Office::class, 'office_id');
    }

    public function emailTemplates(){
        return $this->hasMany(\App\RecruitingEmailTemplate::class, 'smtp_id');
    }
}
