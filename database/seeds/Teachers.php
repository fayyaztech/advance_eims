<?php

use App\ClassTeacher;
use App\Teacher;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class Teachers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i = 0; $i < 10; $i++) {
            $teachers[] = [
                'name' => $faker->name,
                'email' => $faker->email,
                'contact' => $faker->e164PhoneNumber,
                "joining_date" => '2019-' . $faker->date('m-d'),
                "dob" => $faker->date,
                "address" => $faker->address,
                'password' => bcrypt('12345'),
                "is_active" => 1
            ];
        }

        Teacher::insert($teachers);
        for ($i=1; $i < 11; $i++) { 
            $class_teacher[] = [
                'class_id'=>$i,
                'teacher_id'=>$i,
                'joining_date'=>'2020-'.$faker->date('m-d'),
                'is_active'=>1,
            ];
        }

        ClassTeacher::insert($class_teacher);
    }
}
