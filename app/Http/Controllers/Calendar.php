<?php

namespace App\Http\Controllers;

use App\CustomClasses\CommonFunctions;
use App\EventType;
use Illuminate\Http\Request;

class Calendar extends Controller
{
    public function view()
    {
        return view('backend.calendar.view');
    }
    public function event_type()
    {
        $data['event_types'] = EventType::all();
        return view('backend.calendar.event_type',$data);
    }
    public function add_event()
    {
        return view("backend.calendar.add_event");
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
}
