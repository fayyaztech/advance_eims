<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class Dashboard extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function dashboard()
    {
        if (empty(Session("logo"))) {
            $data =json_decode(DB::table('institute_settings')->select("meta_data")->where("type","institute")->first()->meta_data);
            Session(['logo'=> $data->name]);
        }
        return view("backend.admin.dashboard");
    }
    public function blank()
    {
        return view ("backend.admin.blank");
    }
}
