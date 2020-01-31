<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        echo "\nSeeding User Table Data ......";
        $this->call(user_table::class);
        echo "\nSeeding User Academic Year Data ......";
        $this->call(academic_years::class);
        echo "\nSeeding User Academic Year Data ......";
        $this->call(institute_settings::class);
    }
}
