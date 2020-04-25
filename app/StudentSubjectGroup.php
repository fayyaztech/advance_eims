<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentSubjectGroup extends Model
{
    protected $fillable = [
        "class_student_id",
        "subject_group_id",
        "subject_id"
    ];
}
