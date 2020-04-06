<?php

namespace App\Http\Controllers;

use App\CustomClasses\CommonFunctions;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Teachers extends Controller
{
    public function add()
    {
        return view("backend.teachers.form", ["teacher" => '']);
    }

    function list() {
        $teachers = DB::table('teachers')->get();
        return view("backend.teachers.list", ["teachers" => $teachers]);
    }
    public function save(Request $request)
    {
        $request->validate(
            [
                "name" => "required",
                "contact" => "required",
                "email" => "required|unique:teachers",
                "dob" => "required|date_format:Y-m-d",
                "joining_date" => "required|date_format:Y-m-d",
                "address" => "required",
            ]
        );
        $request->request->add(['is_active'=>1,'password'=>12345]);
        $q = Teacher::create($request->input());
        return redirect("/teacher")->with("message", CommonFunctions::msg_response($q,"save"));
    }
    public function delete($id)
    {
        return redirect()->back()->with("message", CommonFunctions::msg_response(Teacher::find($id)->delete(),"delete"));
    }
    public function edit($id)
    {
        $data = Teacher::where('id',$id)->first();
        return view("backend.teachers.form", ["teacher" => $data]);
    }
    public function update(Request $request)
    {

        $request->validate(
            [
                "name" => "required",
                "contact" => "required",
                "email" => "required|unique:teachers,email,".$request->id."id",
                "dob" => "required|date_format:Y-m-d",
                "joining_date" => "required|date_format:Y-m-d",
                "address" => "required",
            ]
        );
        $q = Teacher::find($request->id)->update($request->input());
        return redirect("/teacher")->with("message", CommonFunctions::msg_response($q,"update"));
    }
}
