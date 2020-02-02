<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Classes extends Controller
{
    function list() {
        $data = DB::table('classes')->orderBy('name','asc')->get();
        return view('backend.admin.classes.list', ['row_classes' => $data]);
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
