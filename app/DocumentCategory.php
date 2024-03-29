<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocumentCategory extends Model
{
    // use SoftDeletes, keyFunctionTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'document_categories';

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
    public function offices()
    {
    	return $this->belongsTo(\App\Office::class, 'office_id');
    }

    public function templates(){
        return $this->hasMany(\App\DocumentTemplate::class, 'category_id');
    }
}
