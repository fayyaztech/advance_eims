<?php

namespace App\Http\Controllers;

use App\ClassModel;
use App\ClassTeacher;
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

    function list()
    {
        $query = "select teachers.*, c.name as class_name from teachers left join class_teachers as ct on ct.teacher_id = teachers.id and ct.is_active = 1 left join classes as c on c.id = ct.class_id";
        $teachers = DB::select($query);
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
        $request->request->add(['is_active' => 1, 'password' => 12345]);
        $q = Teacher::create($request->input());
        return redirect("/teacher")->with("message", CommonFunctions::msg_response($q, "save"));
    }
    public function delete($id)
    {
        return redirect()->back()->with("message", CommonFunctions::msg_response(Teacher::find($id)->delete(), "delete"));
    }
    public function edit($id)
    {
        $data = Teacher::where('id', $id)->first();
        return view("backend.teachers.form", ["teacher" => $data]);
    }
    public function update(Request $request)
    {

        $request->validate(
            [
                "name" => "required",
                "contact" => "required",
                "email" => "required|unique:teachers,email," . $request->id . "id",
                "dob" => "required|date_format:Y-m-d",
                "joining_date" => "required|date_format:Y-m-d",
                "address" => "required",
            ]
        );
        $q = Teacher::find($request->id)->update($request->input());
        return redirect("/teacher")->with("message", CommonFunctions::msg_response($q, "update"));
    }

    public function assignToClass($id)
    {
        $data['assigned_class'] = null;
        $classes = ClassModel::orderBy("name", 'ASC')->get();
        $asigned_classes = ClassTeacher::where("is_active", 1)->get();
        $data['teacher'] = Teacher::select("name", "id")->where('id', $id)->first();
        foreach ($classes as $value) {
            $data['classes'][$value->id] = $value->name;
            $data['all_classes'][$value->id] = $value->name;
        }
        foreach ($asigned_classes as $value) {
            unset($data['classes'][$value->class_id]);
            if ($value->teacher_id == $id) {
                $data['assigned_class'] = $value->class_id;
                $data['url'] = "/teacher/assign_class_update/";
                $data['assigned_class_id'] = ClassTeacher::where(['teacher_id' => $value->teacher_id, 'class_id' => $value->class_id, 'is_active' => 1])->first()['id'];
                $data['change_class'] = "Change Class";
            }
        }
        return view("backend.teachers.assign_to_class", $data);
    }
    public function saveAssignToClass(Request $request)
    {
        $request->request->add(['is_active' => 1]);
        $q = ClassTeacher::create($request->input());
        return redirect('/teacher')->with("message", CommonFunctions::msg_response($q, 'save'));
    }

    public function AssignClassUpdate(Request $request)
    {
        $q = ClassTeacher::find($request->id)->update($request->input());
        return redirect('/teacher')->with("message", CommonFunctions::msg_response($q, 'update'));
    }
    public function leaveClass(Request  $request)
    {
        $q = ClassTeacher::find($request->id)->update($request->input());
        return redirect('/teacher')->with("message", CommonFunctions::msg_response($q, 'update'));
    }
}
