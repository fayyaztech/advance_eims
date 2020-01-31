<?php

use Illuminate\Database\Seeder;

class row_classes extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 11; $i++) {
            DB::table('row_classes')->insert([
                'name' => $i,
            ]);

        }
    }
}
