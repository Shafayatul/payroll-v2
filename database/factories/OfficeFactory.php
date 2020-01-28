<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

use App\User;
use App\Office;
use App\Company;
use App\Department;
use App\PublicHolidayCalendar;

/* 
    $table->bigIncrements('id');
    $table->string('name')->nullable();
    $table->string('currency')->nullable();
    $table->string('timezone')->nullable();
    $table->string('street')->nullable();
    $table->string('house')->nullable();
    $table->string('street_additional')->nullable();
    $table->string('city')->nullable();
    $table->string('state')->nullable();
    $table->string('zip')->nullable();
    $table->string('country')->nullable();
    $table->unsignedBigInteger('public_holiday_calendar_id')->nullable();
    $table->unsignedBigInteger('company_id')->nullable();
    $table->softDeletes();
    $table->timestamps();
*/

$factory->define(Office::class, function (Faker $faker) {
    return [
        'name'                       => $faker->sentence,
        'currency'                   => $faker->currencyCode,
        'timezone'                   => $faker->timezone,
        'street'                     => $faker->streetName,
        'house'                      => $faker->buildingNumber,
        'street_additional'          => $faker->streetAddress,
        'city'                       => $faker->city,
        'state'                      => $faker->state,
        'zip'                        => $faker->postcode,
        'country'                    => $faker->country,
        'company_id'                 => function () {
                                            return Company::inRandomOrder()->first()->id;
                                        },
        'public_holiday_calendar_id' => function () {
                                            return PublicHolidayCalendar::inRandomOrder()->first()->id;
                                        },
    ];
});

$factory->afterCreating(Office::class, function ($office, $faker) {
    $office->departments()->saveMany(factory(Department::class, 5)->create());
    $office->users()->saveMany(factory(User::class, 5)->create());
});