<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Section extends Controller
{
    public function view()
    {
        $sections = DB::table('sections')->get();
        return view('backend.admin.section.list', ['sections' => $sections]);
    }
    public function add()
    {
        return view('backend.admin.section.form');
    }
    public function save(Request $req)
    {
        $insert_data = $req->except(["_token"]);
        if (DB::table('sections')->insert($insert_data)) {
            $msg = "data added Successfully";
        } else {
            $msg = "failed to save data please try once";
        }
        return redirect('/sections')->with("message", $msg);
    }
    public function edit($id)
    {
        $data = DB::table('sections')->where("id", $id)->first();
        $data->url = "/sections/save_updates";
        return view('backend.admin.section.form', ['section' => $data]);
    }
    public function save_updates(Request $req)
    {
        $update_data = $req->except(['_token']);
        $q = DB::table('sections')->where('id', $id)->update($update_data);
        if ($q) {
            $msg = "data updated Successfully";
        } else {
            $msg = "failed to update data, please try once";
        }
        return redirect('/sections')->with("message", $msg);
    }
    public function delete($id)
    {
        $q = DB::table('sections')->where("id", $id)->delete();
        if ($q) {
            $msg = "data deleted Successfully";
        } else {
            $msg = "failed to delete data please try once";
        }
        return redirect('/sections')->with("message", $msg);
    }
}
