<?php

namespace App\Http\Controllers;

use App\AcademicYear;
use App\AssignSubjectGroupToClass;
use App\CustomClasses\CommonFunctions;
use App\StudentParent;
use App\Student;
use App\ClassModel;
use App\ClassStudent;
use App\StudentSubjectGroup;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class Students extends Controller
{
    public function list()
    {
        $data['students'] = Student::select(
            'students.first_name as name',
            'students.id as std_id',
            'p.first_name as father_name',
            'p.last_name',
            'mother',
            'contact',
            'email',
            'c.name as class_name',
            'p.id as p_id'
        )
            ->where('students.is_active', 1)
            ->where('c.academic_year_id', '=', Session::get('view_ac_year_id'))
            ->leftjoin('parents as p', 'p.id', '=', 'students.parent_id')
            ->leftjoin('class_students as cs', 'cs.student_id', '=', 'students.id')
            ->leftjoin('classes as c', 'c.id', '=', 'cs.class_id')
            ->get();

        $data['academic_year'] = AcademicYear::where('id', Session::get('view_ac_year_id'))->first()->name;
        return view('backend.student.list', $data);
    }
    public function add()
    {
        $data['student'] = [];
        $data['parent'] = StudentParent::all();
        return view('backend.student.form', $data);
    }

    public function update(Request $request)
    {
        $request->validate([
            "photo" => ['required' | 'mime:png,jpg,jpeg'],
            "first_name" => ['required'],
            "parent_id" => ['required'],
            "mother" => ['required'],
            "date_of_birth" => ['required'],
            "gender" => ['required'],
            "place_of_birth" => ['required'],
            "nationality" => ['required'],
            "mother_tongue" => ['required'],
        ]);
        if ($request->has("photo_upload")) {
            $file = $request->file("photo_upload");
            $file_name = 'photo_upload' . time() . '.' . $file->getClientOriginalExtension();
            $destination_folder = 'uploads/profiles/students';
            $file->move($destination_folder, $file_name);
            $request->request->add(['photo' => $file_name]);
            $old_data = Student::where('id', $request->id)->first();
            if ($old_data->photo !== null) {
                echo $old_file = $destination_folder . '/' . $old_data->photo;
                if (file_exists($old_file)) {
                    unlink($old_file);
                }
            }
        }

        $q = Student::find($request->id)->update($request->input());

        return redirect('/student')->with("message", CommonFunctions::msg_response($q, 'update'));
    }

    public function edit($id)
    {
        $data['url'] = '/student/update';
        $data['update_heading'] = "Student Information Update Form";
        $data['student'] = Student::where('id',$id)->first();
        $data['parent'] = StudentParent::all();
        old('first_name', $data['student']->first_name);
        return view('backend.student.form', $data);
    }

    public function delete($id)
    {
        $q = Student::find($id)->delete();
        return redirect('/student')->with('message', CommonFunctions::msg_response($q, 'delete'));
    }
    public function save(Request $request)
    {
        $request->validate([
            "photo" => ['required' | 'mime:png,jpg,jpeg'],
            "first_name" => ['required'],
            "last_name" => ['required'],
            "parent_id" => ['required'],
            "mother" => ['required'],
            "date_of_birth" => ['required'],
            "gender" => ['required'],
            "place_of_birth" => ['required'],
            "nationality" => ['required'],
            "mother_tongue" => ['required'],
        ]);
        if ($request->has("photo_upload")) {
            $file = $request->file("photo_upload");
            $file_name = 'photo_upload' . time() . '.' . $file->getClientOriginalExtension();
            $destination_folder = 'uploads/profiles/student';
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
    public function pending_admissions()
    {
        $data['students'] = Student::select(
            'students.first_name as name',
            'students.id as std_id',
            'p.first_name as father_name',
            'p.last_name',
            'mother',
            'contact',
            'email',
            'p.id as p_id'
        )
            ->where('students.is_active', 2)
            ->leftjoin('parents as p', 'p.id', '=', 'students.parent_id')
            ->get();
        return view('backend.student.list', $data);
    }

    public function all_students()
    {
        $data['students'] = Student::select(
            'students.first_name as name',
            'students.id as std_id',
            'p.first_name as father_name',
            'p.last_name',
            'mother',
            'contact',
            'email',
            'p.id as p_id'
        )
            ->leftjoin('parents as p', 'p.id', '=', 'students.parent_id')
            ->get();
        return view('backend.student.list', $data);
    }
    public function class($id)
    {
        $data['class_id'] = '';
        $data['student_id'] = $id;
        $data['classes'] = ClassModel::orderBy('name', "ASC")
            ->where('academic_year_id', Session::get('academic_year_id'))
            ->get();
        /**
         * Check Student already admitted in any class
         */
        $q = ClassStudent::where('student_id', $id)
            ->where('c.academic_year_id', Session::get('academic_year_id'))
            ->leftjoin('classes as c', 'c.id', '=', 'class_students.class_id')
            ->get()
            ->count();

        if ($q === 1) {
            $old_class = ClassStudent::where('student_id', $id)
                ->select('class_students.class_id', 'class_students.id')
                ->where('c.academic_year_id', Session::get('academic_year_id'))
                ->leftjoin('classes as c', 'c.id', '=', 'class_students.class_id')
                ->first();
            $data['class_id'] = $old_class->class_id;
            $data['class_student_id'] = $old_class->id;
            $data['url'] = '/student/class/update';
        }
        return view('backend.student.class_student', $data);
    }

    public function load_optional_subjects(Request $request)
    {
        $subject_groups = AssignSubjectGroupToClass::select('sgn.name as group_name', 'sgn.id as group_id', 'rs.name', 'rs.id')
            ->where("assign_group_subjects_to_class.class_id", $request->class_id)
            ->leftjoin("subject_group_names as sgn", 'sgn.id', '=', 'assign_group_subjects_to_class.subject_group_id')
            ->leftjoin('subject_group_subjects as sgs', 'sgs.subject_group_id', '=', 'sgn.id')
            ->leftjoin('row_subjects as rs', 'rs.id', '=', 'sgs.row_subject_id')
            ->get();

        // if ($request->has('class_student_id')) {
        //     $groups = StudentSubjectGroup::where('class_student_id',$request->class_student_id)->get();
        //     foreach ($groups as $group) {
        //         $selected_groups[] = 
        //     }
        // }

        foreach ($subject_groups as $value) {
            $data[$value->group_name]['id'] = $value->group_id;
            $data[$value->group_name]['subjects'][] = ['id' => $value->id, 'name' => $value->name];
        }

        foreach ($data as $key => $value) {
            echo '
            <div class="form-check">
            <label class="form-check-label"> ' . $key . ': ';

            foreach ($value['subjects'] as $subject) {
                echo ' <input type="radio" class="form-check-input" name="' . $value['id'] . '" id="" value="' . $subject['id'] . '" >' . $subject['name'];
            }
            echo '</label>
        </div>
            
            ';
        }
    }

    public function save_class(Request $request)
    {
        $request->request->remove('class_student_id');
        $student_id = $request->student_id;
        $class_id = $request->class_id;
        $student_class = ['student_id' => $student_id, 'class_id' => $class_id];
        $class_data = ClassStudent::create($student_class);
        $request->request->remove('student_id');
        $request->request->remove('class_id');
        $request->request->remove('_token');
        foreach ($request->input() as $group_id => $subject_id) {
            $group_subject[] = ['class_student_id' => $class_data->id, 'subject_group_id' => $group_id, 'subject_id' => $subject_id];
        }

        foreach ($group_subject as $insert) {
            StudentSubjectGroup::insert($group_subject);
        }

        Student::where('id', $student_id)->update(['is_active' => 1]);

        return redirect("/student")->with("message", "class and Subject Assigned Successfully");
    }



    public function class_update(Request $request)
    {
        ClassStudent::where('id', $request->class_student_id)->update(['class_id' => $request->class_id]);
        StudentSubjectGroup::where('class_student_id', $request->class_student_id)->delete();
        $class_student_id = $request->class_student_id;
        $request->request->remove("class_id");
        $request->request->remove("class_student_id");
        $request->request->remove("student_id");
        $request->request->remove("_token");
        foreach ($request->input() as $key => $value) {
            StudentSubjectGroup::create(['class_student_id' => $class_student_id, 'subject_group_id' => $key, 'subject_id' => $value]);
        }

        return redirect("/student")->with("message", "class and Subject Updated Successfully");
    }

    public function profile($id)
    {
        $data['profile'] =  Student::select(
            'students.photo as photo',
            'students.aadhaar',
            'gr_no',
            'students.first_name',
            'students.id as std_id',
            'p.first_name as middle_name',
            'p.last_name',
            'p.address',
            'mother',
            'gender',
            'date_of_birth',
            'contact',
            'email',
            'c.name as class_name',
            'p.id as p_id',
            'date_of_admission',
            'nationality',
            'mother_tongue',
            'place_of_birth',
            'last_attended_school',
            'last_attended_class',
            'exam_percentage',
            'date_of_leaving',
            'bank_name',
            'account_no',
            'ifsc',
            'tc_printed',
            'students.is_active',
            'students.created_at',
            'students.updated_at'
        )
            ->where('students.id', $id)
            ->where('c.academic_year_id', '=', Session::get('view_ac_year_id'))
            ->leftjoin('parents as p', 'p.id', '=', 'students.parent_id')
            ->leftjoin('class_students as cs', 'cs.student_id', '=', 'students.id')
            ->leftjoin('classes as c', 'c.id', '=', 'cs.class_id')
            ->first();
        return view('backend.student.profile', $data);
    }
}
