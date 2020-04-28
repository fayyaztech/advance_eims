<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentParent extends Model
{
    protected $table = "parents";

    protected $fillable = [
        'first_name',
        'last_name',
        'contact',
        'email',
        'address',
        'qualification',
        'aadhaar',
        'name_of_organization',
        'occupation',
        'photo',

    ];
    protected $hidden = ['created_at','updated_at'];
}
