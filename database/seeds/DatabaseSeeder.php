<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Company;
use App\Industry;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(Industry::class, 10)
            ->create()
            ->each(function ($companies) {
                $companies->companies()->factory(Company::class, 5)
                ->create()
                ->each(function ($offices){
                    $offices->offices()->factory(Offices::class, 7)->create();
                });
            });
    }
}
