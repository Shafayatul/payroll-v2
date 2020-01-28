<?php

use Illuminate\Database\Seeder;
// use Faker\Generator as Faker;

use App\User;
use App\Office;
use App\Company;
use App\Industry;
use App\Department;
use App\PublicHolidayCalendar;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $indistry = Industry::create(
            [
                'name' => $faker->company,
            ]
        );
        // dump($indistry);
        $company = Company::create(
            [
                'name'                         => $faker->company,
                'is_sub_company_enable'        => $faker->boolean,
                'is_email_notification_enable' => $faker->boolean,
                'currency'                     => $faker->currencyCode,
                'timezone'                     => $faker->timezone,
                'contact_for_maintenance'      => $faker->phoneNumber,
                'language'                     => $faker->languageCode,
                'company_employee_size'        => 25,
                // 'user_id'                      => function () {
                //                                     return (User::inRandomOrder()->first()->id? User::inRandomOrder()->first()->id:1);
                //                                 },
                // 'industry_id'                  => function () {
                //                                     return (Industry::inRandomOrder()->first()->id? Industry::inRandomOrder()->first()->id:1);
                //                                 },
                // 'public_holiday_calendar_id'   => function () {
                //                                     return (PublicHolidayCalendar::inRandomOrder()->first()->id? PublicHolidayCalendar::inRandomOrder()->first()->id:1);
                //                                 },
        
            ]
        );
        // dump($company);
        $public_calendar = PublicHolidayCalendar::create(
            [
                'name'       => $faker->sentence,
                'type'       => rand(0,5),
                // 'company_id' => function () {
                //                     return (Company::inRandomOrder()->first()->id? Company::inRandomOrder()->first()->id:1);
                //                 },
            ]
        );
        // dump($public_calendar);
        $office = Office::create(
            [
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
                // 'company_id'                 => function () {
                //                                     return (Company::inRandomOrder()->first()->id? Company::inRandomOrder()->first()->id:1);
                //                                 },
                // 'public_holiday_calendar_id' => function () {
                //                                     return (PublicHolidayCalendar::inRandomOrder()->first()->id? PublicHolidayCalendar::inRandomOrder()->first()->id:1);
                //                                 },
            ]
        );
        // dump($office);
        $department = Department::create(
            [
                'name'         => $faker->sentence,
                'working_hour' => rand(20, 48),
                // 'office_id'    => function () {
                //                     return (Office::inRandomOrder()->first()->id? Office::inRandomOrder()->first()->id:1);
                //                 },
            ]
        );
        // dump($department);
        $user  = new User();

        $user->name              = $faker->name;
        $user->email             = 'admin@test.com';
        $user->email_verified_at = now();
        $user->password          = Hash::make('12345678');
        $user->status            = true;
        // $user->office_id         = (Office::inRandomOrder()->first()->id? Office::inRandomOrder()->first()->id:1);
        // $user->department_id     = (Department::inRandomOrder()->first()->id? Department::inRandomOrder()->first()->id:1);
        $user->save();

        // dump($user);
    }
}
