<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

use App\Office;
use App\Department;

/* 
    $table->bigIncrements('id');
    $table->string('name')->nullable();
    $table->string('working_hour')->nullable();
    $table->unsignedBigInteger('office_id')->nullable();
    $table->softDeletes();
    $table->timestamps();
*/

$factory->define(Department::class, function (Faker $faker) {
    return [
        'name'         => $faker->sentence,
        'working_hour' => rand(20, 48),
        'office_id'    => function () {
                            return Office::inRandomOrder()->first()->id;
                        },
    ];
});
