<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormSectionItem extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'form_section_items';

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
    protected $fillable = ['title_key', 'label_min', 'label_max', 'evaluator_info', 'weight', 'form_section_id'];

    public function section(){
        return $this->belongsTo(\App\FormSection::class, 'form_section_id');
    }
}
