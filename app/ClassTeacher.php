<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassTeacher extends Model
{
    protected $fillable = ['class_id','teacher_id','joining_date','leaving_date','is_active'];
}
