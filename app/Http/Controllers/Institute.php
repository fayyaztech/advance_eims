<?php

namespace App\Http\Controllers;

use App\AcademicYear;
use App\institute_settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Institute extends Controller
{
    public function institute_setup()
    {
        $meta_data = [
            "name" => "",
            "contact" => "",
            "email" => "",
            "address" => "",
            "logo" => "",
        ];
        $setting = DB::table('institute_settings')->where("type", "institute")->first();
        if ($setting !== null) {
            $d = json_decode($setting->meta_data);
            $logo = "";
            if(!empty($d->logo)){
                $logo = $d->logo;
            }
            $meta_data = [
                "name" => "$d->name",
                "contact" => "$d->contact",
                "email" => "$d->email",
                "address" => "$d->address",
                "logo" => "$logo",
            ];
        }
        return view("backend.institute.setup", ["setting" => $meta_data]);
    }

    public function academic_year()
    {
        $academic_year = AcademicYear::all()->toArray();
        return view("backend.institute.academic_year", ['academic_year' => $academic_year]);
    }
    public function academic_year_save(Request $req)
    {
        $academic_year = new AcademicYear;
        $academic_year->name = $req->name;
        $academic_year->start_date = $req->startDate;
        $academic_year->end_date = $req->endDate;
        if ($academic_year->save()) {
            $msg = "Year added successfully";
        } else {
            $msg = "Year add failed";
        }
        return redirect()->back()->with("message", $msg);
    }

    public function delete_academic_year($id)
    {
        $ac = AcademicYear::find($id);
        if ($ac->delete()) {
            $msg = "AcademicYear Deleted successfully";
        } else {
            $msg = "delete operation failed";
        }
        return redirect()->back()->with("message", $msg);

    }
    public function update_institute_details(Request $request)
    {
        $type = $request->type;
        $request->validate(
            [
                "name" => "required",
                "contact" => "required",
                "email" => "required",
                "address" => "required",
                "logo" => "image|mimes:jpeg,png,jpg,svg,|max:200",
            ]
        );
        $ex = $request->except(['type', '_token', 'logo']);
        if ($file = $request->file("logo")) {
            $destination_path = "uploads/images";
            $image = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move($destination_path, $image);
            $ex['logo'] = $image;
        }
        $check = institute_settings::where("type", $request->type)->first();
        if (!$check) {
            $is = new institute_settings;
            $is->type = $request->type;
            $is->meta_data = json_encode($ex);
            $is->save();
            $msg = "data saved";
        } else {
            institute_settings::where("type", $request->type)
                ->update(['meta_data' => json_encode($ex)]);
            $msg = "data updated";
        }

        return redirect()->back()->with("message", $msg);
    }
    public function set_current_year($id)
    {
        DB::table('academic_years')->update(['is_active' => false]);
        $q = DB::table('academic_years')->where('id', $id)->update(['is_active' => true]);
        if ($q) {
            $msg = "AcademicYear changed successfully";
        } else {
            $msg = "operation failed";
        }
        return redirect()->back()->with("message", $msg);
    }
}
