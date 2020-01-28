<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

use App\Industry;
use App\Company;

/* 
    $table->bigIncrements('id');
    $table->string('name')->nullable();
    $table->softDeletes();
    $table->timestamps();
*/

$factory->define(Industry::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
    ];
});

$factory->afterCreating(Industry::class, function ($industry, $faker) {
    $industry->companies()->saveMany(factory(Company::class, 5)->create());
});