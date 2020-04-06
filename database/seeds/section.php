<?php

use Illuminate\Database\Seeder;

class section extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sections')->insert([
            'name' => "A",
            "academic_year_id" => 1,
        ]);
        DB::table('sections')->insert([
            'name' => "B",
            "academic_year_id" => 1,
        ]);
        DB::table('sections')->insert([
            'name' => "C",
            "academic_year_id" => 1,
        ]);
    }
}
