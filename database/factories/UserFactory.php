<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

use App\User;
use App\Office;
use App\Department;
/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

/* 
    $table->bigIncrements('id');
    $table->string('name');
    $table->string('email')->unique();
    $table->timestamp('email_verified_at')->nullable();
    $table->string('password');
    $table->boolean('status')->default(true);
    $table->unsignedBigInteger('office_id')->nullable();
    $table->unsignedBigInteger('department_id')->nullable();
    $table->rememberToken();
    $table->softDeletes();
    $table->timestamps();
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name'              => $faker->name,
        'email'             => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password'          => Hash::make('12345678'), // password
        'status'            => $faker->boolean,
        'office_id'         => function () {
                                return Office::inRandomOrder()->first()->id;
                            },
        'department_id'     =>function () {
                                return Department::inRandomOrder()->first()->id;
                            },
    ];
});
