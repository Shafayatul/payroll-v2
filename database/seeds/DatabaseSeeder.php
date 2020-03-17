<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Office;
use App\Company;
use App\Industry;
use App\Attendance;
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

        $this->call(PermissionsTableSeeder::class);
        // $this->call(UsersTableSeeder::class);
        
        // factory(Industry::class, 5)->create();
        
        // factory(\App\EmployeeInformationSection::class, 50)->create();
        // factory(PublicHolidayCalendar::class, 5)->create();
        // factory(Office::class, 5)->create();
        // factory(User::class, 5)->create();
        // for($i = 1; $i <= 12; $i++){
        //     $month_name = date("F", mktime(0, 0, 0, $i, 10));
        //     $month_name = $month_name.' 2020';
        //     Carbon::parse($month_name)->firstOfMonth();
        //     Carbon::parse($month_name)->OfMonth();
        // }
        // $attendance = new Attendance();

        Model::reguard(); // Enable mass assignment
    }
}
