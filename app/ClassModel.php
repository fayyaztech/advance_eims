<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    protected $table = "classes";
    protected $fillable = ['name',"academic_year_id"];
}
