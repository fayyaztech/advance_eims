<?php

namespace App\Http\Controllers;

use App\RowSubject;
use Illuminate\Http\Request;

class RowSubjects extends Controller
{
    function list() {
        $data = RowSubject::all();
        return view('backend.admin.row_subjects.list', ['row_subjects' => $data]);
    }
    public function add()
    {
        return view('backend.admin.row_subjects.form');
    }

    public function save(Request $request)
    {
        $request->validate([
            'name' => ['required'],
        ]);
        $q = RowSubject::create($request->input());
        return redirect('/row_subjects')->with("message", $this->response($q, 'save'));
    }

    public function edit($id)
    {
        $data = RowSubject::where('id',$id)->first();
        $data['url'] = '/row_subjects/update';
        return view('backend.admin.row_subjects.form',['row_subjects'=>$data,'id'=>$id]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => ['required'],
        ]);
        $q = RowSubject::find($request->id)->update($request->input());
        return redirect('/row_subjects')->with("message", $this->response($q, 'save'));
    }


    public function delete($id)
    {
        $q = RowSubject::find($id)->delete();
        return redirect('/row_subjects')->with("message", $this->response($q, 'delete'));
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
