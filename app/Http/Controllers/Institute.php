<?php

namespace App\Http\Controllers;

use App\AcademicYear;
use Illuminate\Http\Request;

class Institute extends Controller
{
    public function institute_setup()
    {
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
}
