<?php

use Illuminate\Database\Seeder;
use App\subjectGroupSubject;

class GroupsSubjectSeeder extends Seeder
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
                'subject_group_id' => 1,
                'row_subject_id' => 1
            ],
            [
                'subject_group_id' => 1,
                'row_subject_id' => 2
            ],
            [
                'subject_group_id' => 1,
                'row_subject_id' => 3
            ],
            [
                'subject_group_id' => 2,
                'row_subject_id' => 7
            ],
            [
                'subject_group_id' => 2,
                'row_subject_id' => 6
            ],
        ];

        subjectGroupSubject::insert($data);
    }
}
