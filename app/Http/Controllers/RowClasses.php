<?php

namespace App\Http\Controllers;

use App\CustomClasses\CommonFunctions;
use App\RowClass;
use Illuminate\Http\Request;

class RowClasses extends Controller
{
    function list() {
        $data = RowClass::all();
        return view('backend.admin.row_classes.list', ['row_classes' => $data]);
    }
    public function add()
    {
        return view('backend.admin.row_classes.form');
    }
    public function save(Request $request)
    {
        $request->request->add(['academic_year_id' => $request->session()->get("academic_year_id")]);
        return redirect('/rowclasses')->with("message", CommonFunctions::msg_response(RowClass::create($request->input()), 'save'));
    }
    public function edit($id)
    {
        $data = RowClass::where("id", $id)->first();
        $data->url = "/rowclasses/save_updates";
        return view('backend.admin.row_classes.form', ['row_classes' => $data]);
    }
    public function save_updates(Request $request)
    {

        $q = RowClass::find($request->id)->update($request->input());
        return redirect('/rowclasses')->with("message", CommonFunctions::msg_response($q, 'update'));
    }
    public function delete($id)
    {
        $q = RowClass::find($id)->delete();
        return redirect('/rowclasses')->with("message", CommonFunctions::msg_response($q, 'delete'));
    }
}
