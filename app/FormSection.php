<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormSection extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'form_sections';

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
    protected $fillable = ['name', 'company_id'];

    public function company(){
        return $this->belongsTo(\App\Company::class, 'company_id');
    }

    public function items(){
        return $this->hasMany(\App\FormSectionItem::class, 'form_section_id');
    }
}
