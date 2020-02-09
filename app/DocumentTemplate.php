<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocumentTemplate extends Model
{
    // use SoftDeletes, keyFunctionTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'document_templates';

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
    protected $fillable = ['name', 'lang', 'template_file', 'category_id'];

    public function categories(){
        return $this->belongsTo(\App\DocumentCategory::class, 'category_id');
    }
}
