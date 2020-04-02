<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubjectGroup extends Model
{
    protected $table = "subject_group_names";
    protected $fillable = ["name","academic_year_id"];

    public function subjectGroupSubjects()
    {
        return $this->hasMany("App\subjectGroupSubject",'subject_group_id');
    }
}
