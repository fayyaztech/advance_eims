<?php

namespace App\Http\Controllers;

use App\AssignedSubjectToClass;
use App\AssignSubjectGroupToClass;
use App\ClassModel;
use App\CustomClasses\CommonFunctions;
use App\RowSubject;
use App\SubjectGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Classes extends Controller
{
    function list()
    {
        $data = [];
        $classes = ClassModel::select("classes.name as class_name", "classes.id as class_id", "rs.name as subject_name", 'sgn.name as subject_group_name', 'rs.id as subject_id', 'sgn.id as group_id')
            ->leftjoin("assign_subjects_to_class as asc", "asc.class_id", "=", "classes.id")
            ->leftjoin("assign_group_subjects_to_class as agc", "agc.class_id", "=", "classes.id")
            ->leftjoin("subject_group_names as sgn", 'sgn.id', '=', 'agc.subject_group_id')
            ->leftjoin("row_subjects as rs", "rs.id", "=", "asc.subject_id")
            ->orderBy("classes.name", "ASC")
            ->get();
        foreach ($classes as $i) {
            $data[$i->class_id]["class_id"] = $i->class_id;
            $data[$i->class_id]['class_name'] = $i->class_name;
            $data[$i->class_id]['assigned_subjects'][$i->subject_id] = $i->subject_name;
            $data[$i->class_id]['assigned_groups'][$i->group_id] = $i->subject_group_name;
        }
        return view('backend.admin.classes.list', ["data" => $data]);
    }
    public function add()
    {
        return view('backend.admin.classes.form');
    }
    public function save(Request $request)
    {
        $request->request->add(['academic_year_id' => Session::get("academic_year_id")]);
        $q = ClassModel::create($request->input());
        return redirect('/classes')->with("message", CommonFunctions::msg_response($q, "save"));
    }
    public function edit($id)
    {
        $data = ClassModel::where("id", $id)->first();
        $data->url = "/classes/save_updates";
        return view('backend.admin.classes.form', ['classes' => $data]);
    }
    public function save_updates(Request $req)
    {
        $id = $req->input("id");
        $update_data = $req->except(['_token']);
        $q = DB::table('classes')->where('id', $id)->update($update_data);
        return redirect('/classes')->with("message", $this->response($q, 'update'));
    }
    public function delete($id)
    {
        $q = DB::table('classes')->where("id", $id)->delete();
        return redirect('/classes')->with("message", $this->response($q, 'delete'));
    }

    public function assign_subjects($id)
    {
        $data['_class'] = ClassModel::where("id", $id)->first();
        $row_subjects = RowSubject::all();
        $a_sub = AssignedSubjectToClass::where("class_id", $id)->get();
        foreach ($row_subjects as $subject) {
            $subjects[$subject->id]["name"] = $subject->name;
            $subjects[$subject->id]['checked'] = "";
        }

        foreach ($a_sub as $value) {
            $subjects[$value->subject_id]['checked'] = "checked";
        }

        $data['row_subjects'] = $subjects;
        return view('backend.admin.classes.assign_subjects', $data);
    }

    public function save_assigned_subjects(Request $request)
    {
        $class_id = $request->class_id;
        AssignedSubjectToClass::where("class_id", $class_id)->delete();
        foreach ($request->subjects as $value) {
            $q = AssignedSubjectToClass::create(['class_id' => $class_id, 'subject_id' => $value]);
        }
        return redirect('/classes')->with("message", CommonFunctions::msg_response($q, "save"));
    }

    public function assign_groups($id)
    {
        // $id is class id
        $class = ClassModel::where("id", $id)->first();
        $ass_groups = AssignSubjectGroupToClass::where("class_id", $id)->get();
        foreach (SubjectGroup::all() as $group) {
            $subject_groups[$group->id]['name'] = $group->name;
            $subject_groups[$group->id]['checked'] = "";
        }
        foreach ($ass_groups as $value) {
            $subject_groups[$value->subject_group_id]['checked'] = "checked";
        }
        return view('backend.admin.classes.assign_groups', ['groups' => $subject_groups,"class"=>$class]);
    }

    public function save_assigned_groups(Request $request)
    {
        AssignSubjectGroupToClass::where("class_id", $request->class_id)->delete();
        foreach ($request->groups as $v) {
            $q = AssignSubjectGroupToClass::create(["class_id" => $request->class_id, "subject_group_id" => $v]);
        }
        return redirect('/classes')->with("message", $this->response($q, ' assign'));
    }

    private function response($response, $msg)
    {
        if ($response) {
            $r = "data " . $msg . "ed Successfully";
        } else {
            $r = "failed to " . $msg . " data please try once";
        }
        return $r;
    }
}
