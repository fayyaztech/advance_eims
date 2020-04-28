<?php

namespace App\Http\Controllers;

use App\StudentParent;
use Illuminate\Http\Request;

class Parents extends Controller
{
    function list()
    {
        $parents = StudentParent::all();
        return view("backend.parent.list", ['parents' => $parents]);
    }
    public function form()
    {
        return view("backend.parent.form", ['parent' => 0]);
    }
    public function save(Request $request)
    {
        $msg = "Failed to Add Parent ";
        $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'unique:parents'],
            'contact' => ['required', 'min:10', 'max:10'],
            'address' => ['required'],
        ]);

        if ($request->has('upload_photo')) {
            $file = $request->file('upload_photo');
            $destination = 'uploads/profiles/parents/';
            $filename = 'parent_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move($destination, $filename);
            $request->request->add(['photo' => $filename]);
        }
        if (StudentParent::create($request->input())) {
            $msg = "Parent Added Successfully";
        }
        return redirect('/parent')->with("message", $msg);
    }
    public function edit($id)
    {
        $parent = StudentParent::find($id);
        return view("backend.parent.form", ['parent' => $parent]);
    }
    public function update(Request $request)
    {
        $msg = "failed to Updated";
        $request->validate([
            'email' => 'required|email|unique:parents,email,' . $request->id . 'id',
            'contact' => 'required|min:10|max:10|unique:parents,contact,' . $request->id . 'id',
            'address' => ['required'],
            'first_name' => ['required'],
            'last_name' => ['required'],
        ]);
        if ($request->has('upload_photo')) {
            $file = $request->file('upload_photo');
            $destination = 'uploads/profiles/parents/';
            $filename = 'parent_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move($destination, $filename);
            $request->request->add(['photo' => $filename]);

            $parent = StudentParent::find($request->id)->first();
            if ($parent->photo) {
                $file_delete = $destination . $parent->photo;
                if (file_exists($file_delete)) {
                    unlink($file_delete);
                }
            }
        }
        if (StudentParent::find($request->id)->update($request->input())) {
            $msg = "Parent Data Updated Successfully";
        }
        return redirect("/parent")->with("message", $msg);
    }
    public function delete($id)
    {
        $destination = 'uploads/profiles/parents/';
        $parent = StudentParent::find($id)->first();
        if ($parent->photo) {
            $file_delete = $destination . $parent->photo;
            if (file_exists($file_delete)) {
                unlink($file_delete);
            }
        }
        $msg = "failed to delete";
        if (StudentParent::find($id)->delete()) {
            $msg = "Parent deleted Successfully";
        }


        return redirect("/parent")->with("message", $msg);
    }

    public function profile($id)
    {
        $data['profile'] = StudentParent::where('id', $id)->first();
        return view('backend.parent.profile', $data);
    }
}
