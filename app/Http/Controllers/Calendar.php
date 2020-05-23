<?php

namespace App\Http\Controllers;

use App\CalendarEvent;
use App\CustomClasses\CommonFunctions;
use App\EventType;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Calendar extends Controller
{
    public function view()
    {
        $data['calendars'] = CalendarEvent::select(
            "calendar_events.id",
            "title",
            "calendars.date as start_date",
            "end_date",
            "start_time",
            "end_time",
            'url',
            'color'
        )
            ->leftjoin("calendars", "calendars.id", "=", "calendar_events.start_date")
            ->leftjoin("event_types as et", "et.id", '=', "calendar_events.event_type_id")
            ->orderBy('start_time', 'DESC')
            ->get();
        return view('backend.calendar.view', $data);
    }
    public function event_type()
    {
        $data['event_types'] = EventType::all();
        return view('backend.calendar.event_type', $data);
    }
    public function add_event()
    {
        $data['event_types'] = EventType::all();
        $data['events'] = CalendarEvent::select(
            "calendar_events.id",
            "title",
            "calendars.date as start_date",
            "end_date",
            "start_time",
            "end_time",
            'url',
            'et.id as event_type_id'
        )
            ->leftjoin("calendars", "calendars.id", "=", "calendar_events.start_date")
            ->leftjoin("event_types as et", "et.id", '=', "calendar_events.event_type_id")
            ->get();
        return view("backend.calendar.add_event", $data);
    }
    public function save_event_type(Request $request)
    {
        $q = EventType::create($request->input());
        return redirect()->back()->with("message", CommonFunctions::msg_response($q, 'save'));
    }
    public function update_event_type(Request $request)
    {
        $q = EventType::find($request->id)->update($request->input());
        return redirect()->back()->with("message", CommonFunctions::msg_response($q, 'update'));
    }
    public function delete_event_type($id)
    {
        $q = EventType::find($id)->delete();
        return redirect()->back()->with("message", CommonFunctions::msg_response($q, 'delete'));
    }

    public function saveEvent(Request $request)
    {
        $id = CommonFunctions::getCalendarId($request->start_date);
        $request->request->add(["start_date" => $id]);
        $q = CalendarEvent::create($request->input());
        return redirect()->back()->with("message", CommonFunctions::msg_response($q, 'save'));
    }
    public function updateEvent(Request $request)
    {
        $id = CommonFunctions::getCalendarId($request->start_date);
        $request->request->add(["start_date" => $id]);
        $q = CalendarEvent::find($request->id)->update($request->input());
        return redirect()->back()->with("message", CommonFunctions::msg_response($q, 'update'));
    }
    public function deleteEvent($id)
    {
        $q = CalendarEvent::find($id)->delete();
        return redirect()->back()->with("message", CommonFunctions::msg_response($q, 'delete'));
    }
    public function json()
    {
        $events = CalendarEvent::select(
            "calendar_events.id",
            "title",
            "calendars.date as start_date",
            "end_date",
            "start_time",
            "end_time",
            'url'
        )
            ->leftjoin("calendars", "calendars.id", "=", "calendar_events.start_date")
            ->get();
        foreach ($events as $event) {
            $d[] = eventJsonGenerator($event);
        }
        return $d;
    }
}
