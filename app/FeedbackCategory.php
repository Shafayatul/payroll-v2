<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeedbackCategory extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'feedback_categories';

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

    public function office(){
        return $this->belongsTo(\App\Office::class, 'office_id');
    }

    public function attributes(){
        return $this->hasMany(\App\FeedbackCategoryAttribute::class, 'feedback_category_id');
    }
}
