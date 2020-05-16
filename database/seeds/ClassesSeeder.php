<?php

use App\AssignedSubjectToClass;
use App\AssignSubjectGroupToClass;
use App\ClassModel;
use Illuminate\Database\Seeder;

class ClassesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'name' => rand(1, 9) . '' . substr(str_shuffle("ABCD"), 0, 1),
                'academic_year_id' => 1
            ];
        }

        ClassModel::insert($data);

        for ($i = 1; $i < 10; $i++) {
            $group[] = [
                'class_id' => $i,
                'subject_group_id' => rand(1, 2)
            ];
        }

        AssignSubjectGroupToClass::insert($group);

        $p = 0;
        for ($i = 1; $i < 10; $i++) {
            for ($j = 1; $j < 5; $j++) {
                $subjects[] = ['class_id' => $i, 'subject_id' => $j];
            }
            $p++;
        }

        AssignedSubjectToClass::insert($subjects);
        // print_r($subjects);
    }
}
