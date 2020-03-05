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

    public function roleTabCategory(){
        return [
            '0' => 'members',
            '1' => 'rights',
            '1' => 'reminders',
            '3' => 'calendars',
            '4' => 'security',
        ];
    }

    public function permissionMeta(){
        return [
            '0' => 'View',
            '1' => 'Propose', 
            '2' => 'Edit',
        ];
    }

    public function permissionAccessType(){
        return [
            '0' => 'Own',
            '1' => 'My reports',
            // '2' => 'Custom',
            '3' => 'All',
        ];
    }

    public function roleRemindAbout(){
        return [
            '0' => 'Probation period end ',
            '1' => 'Hire date',
            '2' => 'Last day of work',
            '3' => 'Contract ends',
            '4' => 'Termination date',
            '5' => 'Last salary change',
            '6' => 'Next absence',
            '7' => 'Birthday',
            '8' => 'Enrollment certificate valid until',
        ];
    }

    public function roleReminderFilterType(){
        return [
            'All employees',
            'Special',
            'Direct team',
            'Own team',
        ];
    }

    public function offsetUnit(){
            
        return [
            'days',
            'weeks',
        ];
    }    

    public function offsetSign(){
        return [
            'after',
            'before',
        ];
    }   
    
    // Holiday Related 

    public function holidayType(){
        return [
            "0" => "Existing holiday",
            "1" => "Fixed date",
            "2" => "Once on a fixed date",
            "3" => "Weekday in month",
            // "4" => "Easter offset"
        ];
    }

    public function weekNumber(){
        return [
            "first" => "1st",
            "second" => "2nd",
            "third" => "3rd",
            "fourth" => "4th"
        ];
    }

    public function weekDay(){
        return [
            "sunday" => "Sunday",
            "monday" => "Monday",
            "tuesday" => "Tuesday",
            "wednesday" => "Wednesday",
            "thursday" => "Thursday",
            "friday" => "Friday",
            "saturday" => "Saturday"
        ];
    }

    public function monthNumber(){
        return [
            "january" => "January",
            "february" => "February",
            "march" => "March",
            "april" => "April",
            "may" => "May",
            "june" => "June",
            "july" => "July",
            "august" => "August",
            "september" => "September",
            "october" => "October",
            "november" => "November",
            "december" => "December"
        ];
    }
}