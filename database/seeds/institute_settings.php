<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class institute_settings extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('institute_settings')->insert([
            "type"=>'institute',
            "meta_data"=>json_encode(['name'=>'RSIM','logo'=>'img.png','contact'=>8765432167,'email'=>'fayyaztech@gmail.com','address'=>'aurangabad MS']),
            'created_at'=> Carbon::now()
        ]);
    }
}
