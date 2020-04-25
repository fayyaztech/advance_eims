<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        "photo",
        "name",
        "lname",
        "parent_id",
        "mother",
        "aadhaar",
        "date_of_birth",
        "gender",
        "place_of_birth",
        "nationality",
        "mother_tongue",
        "previous_school",
        "previous_exam",
        "exam_percentage",
        "resident_address",
    ];
}
