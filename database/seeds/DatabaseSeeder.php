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
        $this->call(users::class);
        echo "\nSeeding User Academic Year Data ......";
        $this->call(academic_years::class);
        echo "\nSeeding User Institute Settings ......";
        $this->call(institute_settings::class);
        echo "\nSeeding User sections Data ......";
        $this->call(section::class);
        echo "\nSeeding User rowClasses Data ......";
        $this->call(row_classes::class);
    }
}
