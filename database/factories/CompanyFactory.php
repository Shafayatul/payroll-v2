<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

use App\User;
use App\Office;
use App\Company;
use App\Industry;
use App\PublicHolidayCalendar;
use App\EmployeeInformationSection;

/* 
    $table->bigIncrements('id');
    $table->string('name')->nullable();
    $table->boolean('is_sub_company_enable')->default(false);
    $table->boolean('is_email_notification_enable')->default(true);
    $table->string('language')->nullable();
    $table->string('currency')->nullable();
    $table->string('timezone')->nullable();
    $table->string('contact_for_maintenance')->nullable();
    $table->integer('company_employee_size')->nullable();
    $table->string('logo')->nullable();
    $table->unsignedBigInteger('user_id')->nullable();
    $table->unsignedBigInteger('industry_id')->nullable();
    $table->unsignedBigInteger('public_holiday_calendar_id')->nullable();
    $table->softDeletes();
    $table->timestamps();
*/

$factory->define(Company::class, function (Faker $faker) {
    return [
        'name'                         => $faker->company,
        'is_sub_company_enable'        => $faker->boolean,
        'is_email_notification_enable' => $faker->boolean,
        'currency'                     => $faker->currencyCode,
        'timezone'                     => $faker->timezone,
        'contact_for_maintenance'      => $faker->phoneNumber,
        'language'                     => $faker->languageCode,
        'company_employee_size'        => 25,
        'user_id'                      => function () {
                                            return User::inRandomOrder()->first()->id;
                                        },
        'industry_id'                  => function () {
                                            return Industry::inRandomOrder()->first()->id;
                                        },
        'public_holiday_calendar_id'   => function () {
                                            return PublicHolidayCalendar::inRandomOrder()->first()->id;
                                        },

    ];
});

$factory->afterCreating(Company::class, function ($company, $faker) {
    $company->publicHolidays()->saveMany(factory(PublicHolidayCalendar::class, 2)->create());
    $company->employeeInformationSections()->saveMany(factory(EmployeeInformationSection::class, 2)->create());
    $company->offices()->saveMany(factory(Office::class, 2)->create());
});


