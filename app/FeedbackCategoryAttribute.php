<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeedbackCategoryAttribute extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'feedback_category_attributes';

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
    protected $fillable = ['name', 'is_required', 'feedback_category_id'];

    public function feedback_category(){
        return $this->belongsTo(\App\FeedbackCategory::class, 'feedback_category_id');
    }
}
