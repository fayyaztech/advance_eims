<?php

namespace App\Http\Controllers;

use App\AssignSubjectGroupToClass;
use App\CustomClasses\CommonFunctions;
use App\StudentParent;
use App\Student;
use App\ClassModel;
use App\ClassStudent;
use App\StudentSubjectGroup;
use App\subjectGroupSubject;
use Illuminate\Http\Request;

class Students extends Controller
{
    public function list()
    {
        $data['students'] = Student::all();
        return view('backend.student.list',$data);
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
            "photo" => ['required' | 'mime:png,jpg,jpeg'],
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
        $data['student_id'] = $id;
        $data['classes'] = ClassModel::orderBy('name', "ASC")->get();
        return view('backend.student.class_student', $data);
    }

    public function load_optional_subjects($class_id)
    {
        $subject_groups = AssignSubjectGroupToClass::select('sgn.name as group_name', 'sgn.id as group_id', 'rs.name', 'rs.id')
            ->where("assign_group_subjects_to_class.class_id", $class_id)
            ->leftjoin("subject_group_names as sgn", 'sgn.id', '=', 'assign_group_subjects_to_class.subject_group_id')
            ->leftjoin('subject_group_subjects as sgs', 'sgs.subject_group_id', '=', 'sgn.id')
            ->leftjoin('row_subjects as rs', 'rs.id', '=', 'sgs.row_subject_id')
            ->get();

        foreach ($subject_groups as $value) {
            $data[$value->group_name]['id'] = $value->group_id;
            $data[$value->group_name]['subjects'][] = ['id' => $value->id, 'name' => $value->name];
        }

        foreach ($data as $key => $value) {
            echo '
            <div class="form-check">
            <label class="form-check-label"> ' . $key . ': ';

            foreach ($value['subjects'] as $subject) {
                echo ' <input type="radio" class="form-check-input" name="' . $value['id'] . '" id="" value="' . $subject['id'] . '">' . $subject['name'];
            }
            echo '</label>
        </div>
            
            ';
        }
    }

    public function save_class(Request $request)
    {
        $student_class = ['student_id' => $request->student_id, 'class_id' => $request->class_id];
        $student_id = ClassStudent::create($student_class);
        // $student_id = 1;
        $request->request->remove('student_id');
        $request->request->remove('class_id');
        $request->request->remove('_token');
        foreach ($request->input() as $group_id => $subject_id) {
            $group_subject[] = ['class_student_id' => $student_id->id, 'subject_group_id' => $group_id, 'subject_id' => $subject_id];
        }
        foreach ($group_subject as $insert) {
            $q = StudentSubjectGroup::insert($group_subject);            
        }

        return redirect("/student")->with("message","class and Subject Assigned Successfully");
    }
}
