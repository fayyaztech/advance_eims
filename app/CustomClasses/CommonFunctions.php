<?php
namespace App\CustomClasses;

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

}
