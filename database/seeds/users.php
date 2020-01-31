<?php

use Illuminate\Database\Seeder;

class users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'fayyaztech',
            'email' => 'fayyaztech@gmail.com',
            'password' => bcrypt('12345678'),
        ]);
    }
}
