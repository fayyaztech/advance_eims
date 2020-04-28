<?php

use App\StudentParent;
use Illuminate\Database\Seeder;

class Parents extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $faker->addProvider(new \Bezhanov\Faker\Provider\Educator($faker));
        $faker->addProvider(new \Bezhanov\Faker\Provider\Commerce($faker));
        for ($i = 0; $i < 15; $i++) {
            $parents[] = [
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                "contact" => $faker->phoneNumber,
                "email" => $faker->email,
                "address" => $faker->address,
                "qualification" => $faker->course,
                "occupation" => $faker->department(6),
                "aadhaar" => $faker->ean13,
                "name_of_organization" => $faker->jobTitle,
                'created_at'=>now(),
                'updated_at' => now(),
            ];
        }

        StudentParent::insert($parents);
    }
}
