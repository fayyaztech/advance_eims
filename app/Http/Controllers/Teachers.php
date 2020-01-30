<?php

namespace App\Http\Controllers;

use App\teachers as AppTeachers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Teachers extends Controller
{
    public function add_teacher_form()
    {
        return view("backend.teachers.teacher_form");
    }

    public function teachers()
    {
        $teachers = DB::table('teachers')->get();
        return view("backend.teachers.teacher",["teachers"=>$teachers]);
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
        if(DB::table('teachers')->where("id",$id)->delete()){
            $msg = "Data deleted Successfully";
        }else{
            $msg = "Some Error Occurred please try again";
        }
        return redirect()->back()->with("message",$msg);
    }
}
