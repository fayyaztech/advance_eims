<?php

use Illuminate\Database\Seeder;

class rowSubjectTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subjects = ['English', 'Hindi', 'marathi', 'science', 'maths', 'geography'];
        for ($i = 0; $i < count($subjects); $i++) {
            DB::table('row_subjects')->insert(["name" => $subjects[$i]]);
        }
    }
}
