<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Classes extends Controller
{
    function list() {
        $data = DB::table('classes')->orderBy('name','asc')->get();
        $sub = DB::table('row_subjects')->get();
        foreach ($sub as $value) {
            $subjects[$value->id] = $value->name;
        }

        $subg = DB::table('subject_groups')->get();
        foreach ($subg as $value) {
            $subject_groups[$value->id] = $value->name;
        }
        return view('backend.admin.classes.list', ['row_classes' => $data,'subjects'=>$subjects,'subject_groups'=>$subject_groups]);
    }
    public function add()
    {
        $classes = DB::table('row_classes')->orderBy('name', 'asc')->get();
        $sections = DB::table('sections')->get();
        return view('backend.admin.classes.form',['classes'=>$classes,'sections'=>$sections]);
    }
    public function save(Request $req)
    {
        $row_class_name = DB::table('row_classes')->where('id',$req->input('row_class_id'))->first()->name;
        $section_name = DB::table('sections')->where('id',$req->input('section_id'))->first()->name;
        $name = $row_class_name.'_'.$section_name;
        $insert_data = [
            "name"=>$name,
            "row_class_id"=>$req->input('row_class_id'),
            "section_id"=>$req->input('section_id'),
            "academic_year_id"=>$req->input('academic_year_id'),
        ];
        $q = DB::table('classes')
            ->insert($insert_data);
        return redirect('/classes')->with("message", $this->response($q, 'save'));
    }
    public function edit($id)
    {
        $data = DB::table('classes')->where("id", $id)->first();
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
        return redirect('/classes')->with("message", $this->response($q,'delete'));
    }

    public function assign_subjects($id)
    {
        // $id is class id
        $data = DB::table('row_subjects')->get();
        $class_name = DB::table('classes')->where('id', $id)->first();
        $assign_subjects = json_decode($class_name->subjects);
        foreach ($data as $item) {
            $subjects[$item->id] = ['name'=>$item->name];
        }
        foreach($assign_subjects as $as){
            array_push($subjects[$as],["status"=>'checked']);
        }
        return view('backend.admin.classes.assign_subjects', ['class_id' => $id, 'subjects' => $data, 'class_name' => $class_name]);
    }

    public function save_assigned_subjects(Request $request)
    {
        $q = DB::table('classes')->where('id', $request->class_id)->update(['subjects' => json_encode($request->subjects)]);
        return redirect('/classes')->with("message", $this->response($q, 'assign'));
    }

    public function assign_groups($id)
    {
        // $id is class id
        $data = DB::table('subject_groups')->get();
        $group_name = DB::table('classes')->where('id', $id)->first()->name;
        return view('backend.admin.classes.assign_groups', ['class_id' => $id, 'groups' => $data, 'class_name' => $group_name]);
    }

    public function save_assigned_groups(Request $request)
    {
        $q = DB::table('classes')->where('id', $request->class_id)->update(['subject_groups' => json_encode($request->groups)]);
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
