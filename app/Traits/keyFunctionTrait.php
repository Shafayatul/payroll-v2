<?php

namespace App\Traits;

trait keyFunctionTrait
{
    // EmployeeAttributeDatatype
    public function attributeTypes()
    {
        return [
            '0' => 'General (e.g. Text, Email, Phone...)',
            '1' => 'List of options',
            '2' => 'Number (integer)',
            '3' => 'Number (up to two decimals)',
            '4' => 'Date',
            '5' => 'Link',
            '6' => 'Multi-line textfield',
            '7' => 'Tags',
        ];
    }

    public function decimalNumbers(){
        return [
            '0' => '1',
            '1' => '2',
        ];
    }

}