<?php

namespace App\Http\Controllers;

use App\StudentParent;
use Illuminate\Http\Request;

class Parents extends Controller
{
    function list() {
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
            'email' => ['required', 'unique:parents'],
            'contact' => ['required', 'min:10', 'max:10'],
            'address' => ['required'],
            'name' => ['required'],
        ]);
        if(StudentParent::create($request->input())){
            $msg = "Parent Added Successfully";
        }
        return redirect('/parent')->with("message",$msg);

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
            'email' => 'required|email|unique:parents,email,'.$request->id.'id',
            'contact' => 'required|min:10|max:10|unique:parents,contact,'.$request->id.'id',
            'address' => ['required'],
            'name' => ['required'],
        ]);
        if (StudentParent::find($request->id)->update($request->input())) {
            $msg = "Parent Data Updated Successfully";
        }
        return redirect("/parent")->with("message",$msg);
    }
    public function delete($id)
    {
        $msg = "failed to delete";
        if (StudentParent::find($id)->delete()) {
            $msg = "Parent deleted Successfully";
        }
        return redirect("/parent")->with("message",$msg);
    }
}
