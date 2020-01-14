<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecuritingEmailTemplate extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'recruiting_email_templates';

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
    protected $fillable = ['name', 'subject', 'message', 'smtp_id'];

    public function smtp(){
        return $this->belongsTo(\App\Smtp::class, 'smtp_id');
    }

    public function recuritingCategories(){
        return $this->hasMany(\App\RecuritingCategory::class, 'autoresponder_template_id');
    }
}
