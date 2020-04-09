<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignedSubjectToClass extends Model
{
    protected $table = "assign_subjects_to_class";
    protected $fillable = ['class_id',"subject_id"];
}
