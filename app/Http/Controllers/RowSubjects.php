<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RowSubjects extends Controller
{
    function list() {
        $data = DB::table('row_subjects')->get();
        return view('backend.admin.row_subjects.list', ['row_subjects' => $data]);
    }
    public function add()
    {
        return view('backend.admin.row_subjects.form');
    }
    public function save(Request $req)
    {
        $insert_data = $req->except(['_token']);
        $q = DB::table('row_subjects')
            ->insert($insert_data);
        return redirect('/row_subjects')->with("message", $this->response($q, 'save'));
    }

    public function delete($id)
    {
        $q = DB::table('row_subjects')->where("id", $id)->delete();
        return redirect('/row_subjects')->with("message", $this->response($q,'delete'));
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
