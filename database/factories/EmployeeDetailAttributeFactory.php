<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\EmployeeDetailAttribute;
use App\EmployeeInformationSection;
use Faker\Generator as Faker;

/* 
    Schema::create('employee_detail_attributes', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->string('name')->nullable();
        $table->boolean('is_unique')->default(false);
        $table->boolean('is_system')->default(false);
        $table->unsignedBigInteger('section_id')->nullable();
        $table->softDeletes();
        $table->timestamps();
    });
*/

$factory->define(EmployeeDetailAttribute::class, function (Faker $faker) {
    return [
        'name' => $faker->firstName,
        'is_unique' => $faker->boolean,
        'is_system' => $faker->boolean,
        'section_id' => function() {
                        return EmployeeInformationSection::inRandomOrder()->first()->id;
                    },
    ];
});
