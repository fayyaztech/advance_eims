<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupSubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seed = [
            ["name"=>"group_1", "row_subject_id"=>1, "academic_year_id"=>1],
            ["name"=>"group_1", "row_subject_id"=>2, "academic_year_id"=>1],
            ["name"=>"group_1", "row_subject_id"=>3, "academic_year_id"=>1],
        ];
        for ($i = 0; $i < count($seed); $i++) {
            DB::table('group_subjects')->insert($seed[$i]);
        }
    }
}
