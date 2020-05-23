<?php
namespace App\CustomClasses;

use App\Calendar;
use Illuminate\Support\Facades\Session;

class CommonFunctions
{

    /**
     * msg_response Function use to avoid creating message again and again
     * @param Boolean  $boolean | its response of query success or failed
     * @param String $msg | its a message of query Saved Edited Or Deleted
     * @return String $response | Build message for user
     */
    public static function msg_response($boolean, $msg)
    {
        if ($msg == "save") {
            $past = "saved";
        } elseif ($msg == "update") {
            $past = "updated";
        } else {
            $past = "deleted";
        }

        if ($boolean) {
            $response = "Record has been " . $past . " Successfully";
        } else {
            $response = "Record has failed to " . $msg . " ! please try again Or Contact to Developers";
        }
        return $response;
    }

    /**
     * Calendar id return function
     * this function return calendar id if exist or create new one
     * @param date $date function required date as parameter
     * @return integer $id function return id of date from calendar table
     */
    public static function getCalendarId($date)
    {
        $date = strtotime($date);
        $date = date("Y-m-d",$date);
        $academic_year_id = Session::get("academic_year_id");
        $data = ['date'=>$date,'academic_year_id'=>$academic_year_id];
        $q = Calendar::where($data)->count();
        if ($q == 0) {
            $r = Calendar::create($data);
        }else{
            $r = Calendar::where($data)->first();
        }
        return $r->id;
    }

}
