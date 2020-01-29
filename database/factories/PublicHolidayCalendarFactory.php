<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

use App\Company;
use App\CalendarYear;
use App\PublicHolidayCalendar;

/* 
    $table->bigIncrements('id');
    $table->string('name')->nullable();
    $table->string('type')->nullable();
    $table->unsignedBigInteger('company_id')->nullable();
    $table->softDeletes();
    $table->timestamps();
*/

$factory->define(PublicHolidayCalendar::class, function (Faker $faker) {
    return [
        'name'       => $faker->sentence,
        'type'       => $faker->boolean,
        'company_id' => function () {
                            return Company::inRandomOrder()->first()->id;
                        },
    ];
});

$factory->afterCreating(PublicHolidayCalendar::class, function ($calender, $faker) {
    $calender->calendarYears()->saveMany(factory(CalendarYear::class, 5)->create());
});