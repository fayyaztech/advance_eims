<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class subjectGroup extends Controller
{
    function list() {
        $data = DB::table('subject_groups')->get();
        return view('backend.admin.subject_group.list', ['subject_groups' => $data]);
    }
    public function add()
    {
        return view('backend.admin.subject_group.form');
    }
    public function save(Request $req)
    {
        $insert_data = $req->except(['_token']);
        $q = DB::table('row_classes')
            ->insert($insert_data);
        return redirect('/rowclasses')->with("message", $this->response($q, 'save'));
    }
    public function edit($id)
    {
        $data = DB::table('row_classes')->where("id", $id)->first();
        $data->url = "/rowclasses/save_updates";
        return view('backend.admin.row_classes.form', ['row_classes' => $data]);
    }
    public function save_updates(Request $req)
    {
        $id = $req->input("id");
        $update_data = $req->except(['_token']);
        $q = DB::table('row_classes')->where('id', $id)->update($update_data);
        return redirect('/rowclasses')->with("message", $this->response($q, 'update'));
    }
    public function delete($id)
    {
        $q = DB::table('row_classes')->where("id", $id)->delete();
        return redirect('/rowclasses')->with("message", $this->response($q,'delete'));
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
