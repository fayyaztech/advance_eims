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
        ]);
        DB::table('sections')->insert([
            'name' => "B",
        ]);
        DB::table('sections')->insert([
            'name' => "C",
        ]);
    }
}
