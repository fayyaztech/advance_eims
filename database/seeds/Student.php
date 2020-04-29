<?php

use App\ClassStudent;
use App\Student as AppStudent;
use App\StudentSubjectGroup;
use Illuminate\Database\Seeder;

class Student extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $faker->addProvider(new \Bezhanov\Faker\Provider\Demographic($faker));
        $faker->addProvider(new \Bezhanov\Faker\Provider\Educator($faker));
        $faker->addProvider(new \Faker\Provider\de_DE\Payment($faker));
        for ($i = 0; $i < 30; $i++) {
            $students[] = [
                "first_name" => $faker->firstName,
                "gr_no" => $faker->bankRoutingNumber,
                "parent_id" => rand(1, 15),
                "mother" => $faker->firstNameFemale,
                "gender" => $faker->gender,
                "date_of_birth" => $faker->date("Y-m-d", now()),
                "date_of_admission" => $faker->date("Y-m-d", now()),
                "nationality" => $faker->country,
                "mother_tongue" => $faker->languageCode,
                "place_of_birth" => $faker->city,
                "aadhaar" => $faker->bankRoutingNumber,
                "last_attended_school" => $faker->secondarySchool,
                "last_attended_class" => $faker->course,
                "last_attended_exam" => $faker->course,
                "exam_percentage" => rand(30, 100) . '%',
                "bank_name" => $faker->bank,
                "account_no" => $faker->bankAccountNumber,
                "ifsc" => $faker->swiftBicNumber,
                'is_active'=>1,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        AppStudent::insert($students);
        
        $std = 1;
        for ($i = 0; $i < 30; $i++) {
            $classStudent[] = [
                'class_id' => rand(1, 10),
                'student_id' => $std++,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        ClassStudent::insert($classStudent);

        $std = 1;
        for ($i = 0; $i < 30; $i++) {
            $subjectGroup[] = [
                "class_student_id" => $std++,
                "subject_group_id" => rand(1, 2),
                "subject_id" => rand(1, 3),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        StudentSubjectGroup::insert($subjectGroup);
    }
}
