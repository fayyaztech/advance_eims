<?php

namespace App\Http\Controllers;

use App\RowSubject;
use App\SubjectGroup;
use App\subjectGroupSubject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class SubjectGroups extends Controller
{
    function list() {
        $subject_groups = [];
        $data = SubjectGroup::where("subject_group_names.academic_year_id", Session::get("view_ac_year_id"))
            ->select('subject_group_names.name as group_name', 'subject_group_names.id as group_id', 'rs.name as subject_name')
            ->leftjoin("subject_group_subjects as sgs", "subject_group_names.id", "=", "sgs.subject_group_id")
            ->leftjoin("row_subjects as rs", "sgs.row_subject_id", "=", "rs.id")
            ->get();
        foreach ($data as $value) {
            $subject_groups[$value->group_name]["subjects"][] = $value->subject_name;
            $subject_groups[$value->group_name]["id"] = $value->group_id;
        }
        return view('backend.admin.subject_group.list', ['subject_groups' => $subject_groups]);
    }
    public function add()
    {
        return view('backend.admin.subject_group.form');
    }
    public function save(Request $request)
    {
        $request->request->add(['academic_year_id' => $request->session()->get("academic_year_id")]);
        $q = SubjectGroup::create($request->input());
        return redirect('/subject_groups')->with("message", $this->response($q, 'save'));
    }
    public function edit($id)
    {
        $data = SubjectGroup::where("id", $id)->first();
        $data->url = "/subject_groups/save_updates";
        return view('backend.admin.subject_group.form', ['subject_group' => $data]);
    }
    public function save_updates(Request $request)
    {
        $q = SubjectGroup::find($request->id)->update($request->input());
        return redirect('/subject_groups')->with("message", $this->response($q, 'update'));
    }
    public function delete($id)
    {
        $q = SubjectGroup::find($id)->delete();
        return redirect('/subject_groups')->with("message", $this->response($q, 'delete'));
    }

    public function assign_subject($id)
    {
        $already_assigned_subjects = [];
        $data = RowSubject::all();
        $group = SubjectGroup::where("id", $id)->first();
        foreach(subjectGroupSubject::where("subject_group_id", $id)->get() as $id){
            $already_assigned_subjects[$id->row_subject_id] = $id->row_subject_id;
        }
        foreach ($data as $subject) {
            $subjects[$subject->id] = $subject->name;
        }
        return view('backend.admin.subject_group.assign_subjects', ['group_id' => $id, 'subjects' => $subjects, 'group' => $group, 'already_assigned_subjects' => $already_assigned_subjects]);
    }

    public function save_assigned_subjects(Request $request)
    {
        subjectGroupSubject::where("subject_group_id",$request->group_id)->delete();
        foreach ($request->subjects as $subject_id) {
            $q = subjectGroupSubject::create(["subject_group_id" => $request->group_id, 'row_subject_id' => $subject_id]);
        }
        return redirect('/subject_groups')->with("message", $this->response($q, 'assign'));
    }
    private function response($response, $msg)
    {
        if ($response) {
            $r = "data " . $msg . "ed Successfully";
        } else {
            $r = "failed to" . $msg . " data please try once";
        }
        return $r;
    }
}
