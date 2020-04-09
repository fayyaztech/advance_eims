<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignSubjectGroupToClass extends Model
{
    protected $table = "assign_group_subjects_to_class";
    protected $fillable = ['class_id','subject_group_id'];
}
