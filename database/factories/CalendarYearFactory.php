<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

use App\CalendarYear;
use App\CalendarHoliday;
use App\PublicHolidayCalendar;

/* 
    Schema::create('calendar_years', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->string('year')->nullable();
        $table->unsignedBigInteger('calendar_id')->nullable();
        $table->softDeletes();
        $table->timestamps();
    });

*/

$factory->define(CalendarYear::class, function (Faker $faker) {
    return [
        'year' => $faker->numberBetween(2015, 2022),
        'calendar_id'   => function () {
            return PublicHolidayCalendar::inRandomOrder()->first()->id;
        },
    ];
});

$factory->afterCreating(CalendarYear::class, function ($year, $faker) {
    $year->holidays()->saveMany(factory(CalendarHoliday::class, 10)->create());
});