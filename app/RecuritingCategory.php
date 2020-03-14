<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecruitingCategory extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'recruiting_categories';

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
    protected $fillable = ['name', 'sorting_order', 'autoresponder', 'autoresponder_id', 'autoresponder_template_id'];

    public function autoresponder(){
        return $this->belongsTo(\App\User::class, 'autoresponder_id');
    }

    public function autoresponderTemplate(){
        return $this->belongsTo(\App\RecurringCompensationType::class, 'autoresponder_template_id');
    }
}
