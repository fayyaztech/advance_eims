<?php

namespace App\Http\Controllers;

use App\teachers as AppTeachers;
use Illuminate\Http\Request;

class Teachers extends Controller
{
    public function add_teacher_form()
    {
        return view("backend.teachers.teacher_form");
    }

    public function teachers()
    {
        return view("backend.teachers.teacher");
    }
    public function save_teacher(Request $req)
    {
        $req->validate(
            [
                "name" => "required",
                "contact" => "required",
                "email" => "required",
                "dob" => "required",
                "joining_date" => "required",
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
    public function delete_teacher()
    {

    }
}
