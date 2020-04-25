<?php

namespace App\Http\Controllers;

use App\CustomClasses\CommonFunctions;
use App\StudentParent;
use App\Student;
use Illuminate\Http\Request;

class Students extends Controller
{
    public function list()
    {
        return view('backend.student.list');
    }
    public function add()
    {
        $data['student'] = [];
        $data['parent'] = StudentParent::all();
        return view('backend.student.form', $data);
    }
    public function save(Request $request)
    {
        $request->validate([
            "photo" => ['required'|'mime:png,jpg,jpeg'],
            "name" => ['required'],
            "lname" => ['required'],
            "parent_id" => ['required'],
            "mother" => ['required'],
            "date_of_birth" => ['required'],
            "gender" => ['required'],
            "place_of_birth" => ['required'],
            "nationality" => ['required'],
            "mother_tongue" => ['required'],
            "previous_school" => ['required'],
            "previous_exam" => ['required'],
        ]);
        if ($request->has("photo_upload")) {
            $file = $request->file("photo_upload");
            $file_name = 'photo_upload' . time() . '.' . $file->getClientOriginalExtension();
            $destination_folder = 'uploads/student_photos';
            $file->move($destination_folder, $file_name);
            $request->request->add(['photo' => $file_name]);
        }
        $q = Student::create($request->input());
        if ($q) {
            $id = $q->id;
            return redirect('/student/class/' . $id)->with('message', CommonFunctions::msg_response($q, "save"));
        } else {
            return redirect()->back()->with("message", CommonFunctions::msg_response($q, 'save'));
        }
    }
    public function class($id)
    {
        Student::find($id)->first();
    }
}
