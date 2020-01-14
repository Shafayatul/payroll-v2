<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecuritingSetting extends Model
{
     /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'recuriting_settings';

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
    protected $fillable = ['is_xml_interface_enabled', 'email_for_applicants', 'is_interview_calendar_invites', 'email_sender_name', 'is_autometic_applicant_anonymization', 'anonymization_after', 'company_id'];

    public function company(){
        return $this->belongsTo(\App\Company::class, 'company_id');
    }
}
