<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        "photo",
        "first_name",
        "last_name",
        "parent_id",
        "mother",
        "aadhaar",
        "date_of_birth",
        "gender",
        "place_of_birth",
        "nationality",
        "mother_tongue",
        "last_attended_school",
        'last_attended_class',
        "last_attended_exam",
        "exam_percentage",
        "resident_address",
        'bank_name',
        'account_no',
        'ifsc',
        'gr_no',
    ];
}
