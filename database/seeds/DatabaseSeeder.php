<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Company;
use App\Industry;
use App\Office;
use App\PublicHolidayCalendar;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard(); // Disable mass assignment

        $this->call(UsersTableSeeder::class);
        
        factory(Industry::class, 5)->create();
        
        // factory(\App\EmployeeInformationSection::class, 50)->create();
        // factory(PublicHolidayCalendar::class, 5)->create();
        // factory(Office::class, 5)->create();
        // factory(User::class, 5)->create();

        Model::reguard(); // Enable mass assignment
    }
}
