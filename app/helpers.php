<?php

use Illuminate\Support\HtmlString;

/**
 * statusUiResponse : response student active inactive html ui design
 * @param Int $status student is_active status code 
 * @return String $ui is Html Ui design
 */
function statusUiResponse(int $status)
{
    if ($status == 0) {
        //deactivate
        $badge = '<span class="badge badge-dark">Inactive/Deactivated</span>';
    } elseif ($status == 1) {
        //active
        $badge = '<span class="label label-success">Active</span>';
    } else {
        //$pending
        $badge  = '<span class="label label-warning">Admission Pending..</span>';
    }

    return new HtmlString($badge);
}
