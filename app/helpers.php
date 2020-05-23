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

function isOneDayEvent($date)
{
    $q = ($date == null) ? '<span class="label label-warning">Its one day Event</span>' : $date;
    return new HtmlString($q);
}
function isWholeDayEvent($date)
{
    $q = ($date == null) ? '<span class="label label-warning">Its Whole Day Event</span>' : $date;
    return new HtmlString($q);
}
function blankReturnNull($string)
{
    $q = ($string == null) ? "--" : $string;
    return new HtmlString($q);
}
function eventJsonGenerator($event)
{
    //predefined params
    $endDateString = []; //if end date not received
    $isAllDay = 'true'; //default no one day event
    $end_date = null; //default null
    $url = []; //default url blank
    $_start_date = $event->start_date;
    $_end_date = $event->start_date;
    $_start_time = "00:00:00";
    $_end_time = "00:00:00";

    if ($event->url !== null) {
        $url = ["url" => $event->url];
    }

    //check whether end time exist
    if($event->end_time !== null){
        $_end_time = $event->end_time;
        $isAllDay = 'false';
    }
    //check whether end date not null if null then its one day event
    if ($event->end_date !== null) {
        $_end_date = $event->end_date;
        $_end_time = "00:00:00";
        $isAllDay = 'false';
        // $end_date = date("Y-m-d H:s:i", strtotime($event->end_date . " 00:00:00"));
    }
    //check whether start time exist or not and create time date format
    if ($event->start_time !== null) {
        // $start_date = date("Y-m-d H:s:i", strtotime($event->start_date . " " . $event->start_time));
        $_start_time = $event->start_time;
        $isAllDay = 'false';
    }


    $start_date = date("Y-m-d H:s:i", strtotime($_start_date . " ".$_start_time));
    if ($isAllDay !== 'true') {
        $url = [];
        $end_date = date("Y-m-d H:s:i", strtotime($_end_date . " ".$_end_time));
    }


    $st = dateTimeToArray($start_date);
    $startDateString = $st['year'] . ", " . intval($st['month']) . ", " . intval($st['day']) . ", " . intval($st['hour']) . ", " . intval($st['minute']);

    if ($end_date !== null) {
        $et = dateTimeToArray($end_date);
        $endDateString = ["end" => $et['year'] . ", " . intval($et['month']) . ", " . intval($et['day']) . ", " . intval($et['hour']) . ", " . intval($et['minute'])];
    }

    $data = [
        "title" => $event->title,
        "start" => $startDateString,
        "allDay" => $isAllDay,
        "backgroundColor" => $event->color,
        "borderColor" => '#00c0ef'
    ];
    if (count($endDateString) !== 0) {
        $data = array_merge($data, $endDateString);
    }
    if (count($url) !== 0) {
        $data = array_merge($url, $data);
    }
    return $data;
}

function dateTimeToArray($dataTime)
{
    $date['year'] = date("Y", strtotime($dataTime));
    $date['month'] = date("m", strtotime($dataTime)) - 1;
    $date['day'] = date("d", strtotime($dataTime));
    $date['hour'] = date("H", strtotime($dataTime));
    $date['minute'] = date("s", strtotime($dataTime));
    return $date;
}
