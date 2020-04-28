<?php

use App\Http\Controllers\SubjectGroups;
use App\SubjectGroup;
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
        $data = [
            [
                'name' => "language_group",
                'academic_year_id' => 1,
            ],
            [
                'name' => 'Second Group',
                'academic_year_id' => 1,
            ]
        ];

        SubjectGroup::insert($data);
    }
}
