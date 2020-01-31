<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
     */

    use AuthenticatesUsers;

    /**
     * Setting up session variable before redirect
     */

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::DASHBOARD;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->set_required();
        $this->middleware('guest')->except('logout');
    }

    /**
     * Set extra required session variable from another tables
     * institute name
     * active academic year
     */

    private function set_required()
    {
        $institute_name = json_decode(DB::table('institute_settings')->where('type', 'institute')->first()->meta_data)->name;
        $academic_year = DB::table('academic_years')->where('is_active', true)->first()->is_active;
        Session(['institute_name' => $institute_name, 'academic_year_id' => $academic_year]);
    }

    /**
     * Logout
     */
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        Session::flush();
        return redirect('/login');
      }
}
