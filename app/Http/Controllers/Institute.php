<?php

namespace App\Http\Controllers;

use App\AcademicYear;
use App\institute_settings;
use Illuminate\Http\Request;

class Institute extends Controller
{
    public function institute_setup()
    {
        $is = institute_settings::where("type","institute")->first();
        print_r($is);
        return view("backend.institute.setup");
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
        echo $id;
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
        $ex = $request->except(['type', '_token']);
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
}
