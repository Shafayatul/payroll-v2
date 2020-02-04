<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Company;
use App\EmployeeDetailAttribute;
use App\EmployeeInformationSection;
use Faker\Generator as Faker;
use Faker\Factory;

/* 
    $table->bigIncrements('id');
    $table->string('name')->nullable();
    $table->tinyInteger('type')->nullable();
    $table->unsignedBigInteger('company_id')->nullable();
    $table->softDeletes();
    $table->timestamps();
*/

$factory->define(EmployeeInformationSection::class, function (Faker $faker) {
    $faker = Factory::create('fr_FR');
    return [
        'name'       => $faker->departmentName,
        'type'       => $faker->boolean,
        'company_id' => function(){
                        return Company::inRandomOrder()->first()->id;
                    },
    ];
});

$factory->afterCreating(EmployeeInformationSection::class, function ($section, $faker) {
    $section->employeeDetailAttributes()->saveMany(factory(EmployeeDetailAttribute::class, 5)->create());
});
