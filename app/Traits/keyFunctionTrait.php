<?php

namespace App\Traits;

trait keyFunctionTrait
{
    // EmployeeAttributeDatatype
    public function attributeTypes()
    {
        return [
            '0' => 'General',
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

    //BoardingTemplate.php
    //BoardingStep.php
    public function boardingTemplateType()
    {
        $data = [
            '0' => 'Offboarding',
            '1' => 'Onboarding',
        ];

        return $data;
    }
    
    //BoardingStep.php
    public function boardingStepType()
    {
        $data = [
            '0' => 'General step',
        ];

        return $data;
    }

    //BoardingStep.php
    public function boardingStepItems()
    {
        $data = [
            '0' => 'Text Information',
            '1' => 'Document for download',
            '2' => 'Employee attribute',
            '3' => 'Profile picture',
            '4' => 'Checkbox',
            '5' => 'Fill text field',
            '6' => 'Enter URL',
            '7' => 'Upload document',
        ];

        return $data;
    }

    //BoardingTemplateStep.php
    public function boardingTemplateStepHighringType()
    {
        $data = [
            '0' => 'before hire',
            '1' => 'after hire',
        ];

        return $data;
    }

    public function documentCategory()
    {
        $data = [
            '0' => 'Other documents',
            '1' => 'Certificates of employment',
            '2' => 'Work contracts',
            '3' => 'Absence certificates',
            '4' => 'Application documents',
            '5' => 'Payroll',
            '6' => 'Performance',
            '7' => 'Study documents',
        ];

        return $data;
    }

    public function templateLang()
    {
        $data = [
            '0' => 'English',
            '1' => 'French',
            '2' => 'German',
            '3' => 'Spanish',
        ];

        return $data;
    }

}