<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

use App\CalendarHoliday;
use App\CalendarYear;

/* 
    Schema::create('calendar_holidays', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->string('name')->nullable();
        $table->text('details')->nullable();
        $table->boolean('is_halfday')->nullable();
        $table->unsignedBigInteger('calendar_year_id')->nullable();
        $table->softDeletes();
        $table->timestamps();
    });
*/

$factory->define(CalendarHoliday::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'details' => $faker->sentence,
        'is_halfday' => $faker->boolean,
        'calendar_year_id' => function (){
            return CalendarYear::inRandomOrder()->first()->id;
        },
    ];
});
