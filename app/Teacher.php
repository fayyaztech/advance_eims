<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = [
        "name",
        "email",
        "contact",
        "joining_date",
        "dob",
        "address",
        "password",
        "is_active",
    ];
}
