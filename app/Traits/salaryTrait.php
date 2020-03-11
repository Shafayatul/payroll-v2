<?php

namespace App\Traits;

trait salaryTrait
{
    // public function employeeType(){
    //     return [
    //         '0' => 'Half Time',
    //         '1' => 'Full Time'
    //     ];
    // }

    public function contributions(){
        return [
            'disease_e' => [
                'name' => 'Disease E',
                'description' => 'Disease Emergency',
                'type' => 'Disease E',
                'rate' => 0.25,
            ],
            'disease_n' => [
                'name' => 'Disease N',
                'description' => 'Disease Normal',
                'type' => 'Disease E',
                'rate' => 2.80
            ],
            'pension' => [
                'name' => 'Pension',
                'description' => 'Pension',
                'type' => 'Disease E',
                'rate' => 8,
            ],
            'AAI' => [
                'name' => 'AAI',
                'description' => 'AAI',
                'type' => 'Disease E',
                'rate' => 0.90
            ],
            'mutuality' => [
                'name' => 'Mutuality',
                'description' => 'Mutuality',
                'type' => 'Disease E',
                'rate' => 2.95
            ],
        ];
    }

    
}