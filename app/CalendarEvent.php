<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CalendarEvent extends Model
{
    protected $fillable = [
        "start_date",//its calendar id reference
        "end_date",
        "event_type_id",
        "title",
        "start_time",
        "end_time",
        "url"
    ];
}
