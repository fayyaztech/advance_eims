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
        echo "\nSeeding User rowSubjectTableSeed Data ......";
        $this->call(rowSubjectTableSeed::class);
        echo "\nSeeding User GroupSubjectTableSeed Data ......";
        $this->call(rowSubjectTableSeed::class);
        echo "\nSeeding User GroupSubjectsTableSeeder Data ......";
        $this->call(GroupSubjectsTableSeeder::class);
        echo "\nSeeding User ClassSeeder Data ......";
        $this->call(ClassesSeeder::class);
        echo "\nSeeding User Teachers Data ......";
        $this->call(Teachers::class);
        echo "\nSeeding User Parents Data ......";
        $this->call(Parents::class);
        echo "\nSeeding User Student Data ......";
        $this->call(Student::class);
    }
}
