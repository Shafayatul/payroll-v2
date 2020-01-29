<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    public function defaultColor()
    {
        return '#aaaaaa';
    }

    public function validOnData()
    {
        $data = [
            '' => 'Please Select...',
            'Work Schedule on Mon-Fri' => 'Work Schedule on Mon-Fri',
            'Work Schedule on Mon-Sat' => 'Work Schedule on Mon-Sat',
            'Work Schedule, incl. Holidays' => 'Work Schedule, incl. Holidays',
            'Work Schedule, excl. Holidays' => 'Work Schedule, excl. Holidays',
            'Mon-Sun' => 'Mon-Sun',
        ];
        return $data;
    }

    public function carryoverType()
    {
        $types = [
            '' => 'Please Select...',
            'limited' => 'Limited carryover',
            'unlimited' => 'Unlimited carryover',
            'none' => 'No carryover',
        ];
        return $types;
    }
}
