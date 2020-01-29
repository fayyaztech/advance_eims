<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class academic_years extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("academic_years")->insert([
            "name"=>"2019-20",
            "start_date"=> Carbon::createFromFormat('Y-m-d', '2019-06-07')->toDateTimeString(),
            "end_date"=> Carbon::createFromFormat('Y-m-d', '2020-12-31')->toDateTimeString(),
            "created_at" => Carbon::now(),
        ]);
        DB::table("academic_years")->insert([
            "name"=>"2020-21",
            "start_date"=> Carbon::createFromFormat('Y-m-d', '2020-06-07')->toDateTimeString(),
            "end_date"=> Carbon::createFromFormat('Y-m-d', '2021-12-31')->toDateTimeString(),
            "created_at" => Carbon::now(),
        ]);
        DB::table("academic_years")->insert([
            "name"=>"2021-22",
            "start_date"=> Carbon::createFromFormat('Y-m-d', '2021-06-07')->toDateTimeString(),
            "end_date"=> Carbon::createFromFormat('Y-m-d', '2022-12-31')->toDateTimeString(),
            "created_at" => Carbon::now(),
        ]);
    }
}
