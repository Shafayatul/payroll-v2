<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocumentCategory extends Model
{
    public function offices()
    {
    	return $this->belongsTo(\App\Office::class, 'office_id');
    }
}
