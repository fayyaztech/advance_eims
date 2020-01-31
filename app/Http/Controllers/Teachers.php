<?php

namespace App\Http\Controllers;

use App\teachers as AppTeachers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Teachers extends Controller
{
    public function add_teacher_form()
    {
        return view("backend.teachers.form", ["teacher" => '']);
    }

    public function teachers()
    {
        $teachers = DB::table('teachers')->get();
        return view("backend.teachers.list", ["teachers" => $teachers]);
    }
    public function save_teacher(Request $req)
    {
        $req->validate(
            [
                "name" => "required",
                "contact" => "required",
                "email" => "required",
                "dob" => "required|date_format:Y-m-d",
                "joining_date" => "required|date_format:Y-m-d",
                "address" => "required",
            ]
        );
        $teacher = new AppTeachers;
        $teacher->name = $req->name;
        $teacher->contact = $req->contact;
        $teacher->email = $req->email;
        $teacher->dob = $req->dob;
        $teacher->joining_date = $req->joining_date;
        $teacher->address = $req->address;
        if ($teacher->save()) {
            $msg = "Teacher added successfully";
        } else {
            $msg = "Teacher add failed";
        }
        return redirect("/teachers")->with("message", $msg);
    }
    public function delete_teacher($id)
    {
        if (DB::table('teachers')->where("id", $id)->delete()) {
            $msg = "Data deleted Successfully";
        } else {
            $msg = "Some Error Occurred please try again";
        }
        return redirect()->back()->with("message", $msg);
    }
    public function edit_teacher($id)
    {
        $data = DB::table('teachers')->where("id", $id)->first();
        return view("backend.teachers.form", ["teacher" => $data]);
    }
    public function update_teacher(Request $req)
    {
        $resp = DB::table('teachers')
            ->where("id",$req->id)
            ->update([
                'name' => $req->name,
                'email' => $req->email,
                'contact' => $req->contact,
                'address' => $req->address,
                'dob' => $req->dob,
                'joining_date' => $req->joining_date,
            ]);
        if ($resp == true) {
            $message = "Teacher Successfully updated";
        } else {
            $message = "Something went wrong please try again";
        }
        return redirect("/teachers")->with("message", $message);
    }
}
