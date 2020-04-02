<?php

namespace App\Http\Controllers;

use App\CustomClasses\CommonFunctions;
use App\Section as AppSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Section extends Controller
{
    public function view()
    {
        $sections = AppSection::where("academic_year_id", Session::get("view_ac_year_id"))->get();
        return view('backend.admin.section.list', ['sections' => $sections]);
    }
    public function add()
    {
        return view('backend.admin.section.form');
    }
    public function save(Request $request)
    {
        $request->request->add(['academic_year_id' => Session::get("academic_year_id")]);
        $q = AppSection::create($request->input());
        return redirect('/sections')->with("message", CommonFunctions::msg_response($q, "save"));
    }
    public function edit($id)
    {
        $data = AppSection::where('id', $id)->first();
        $data->url = "/sections/save_updates";
        return view('backend.admin.section.form', ['section' => $data]);
    }
    public function save_updates(Request $req)
    {
        $q = AppSection::find($req->id)->update($req->input());
        return redirect('/sections')->with("message", CommonFunctions::msg_response($q, 'update'));
    }
    public function delete($id)
    {
        $q = AppSection::find($id)->delete();
        return redirect('/sections')->with("message", CommonFunctions::msg_response($q, 'delete'));
    }
}
