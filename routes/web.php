<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('logout/','\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/blank','Dashboard@blank');
Route::get('/institute_setup','Institute@institute_setup');
Route::post('/update_institute_details','Institute@update_institute_details');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard','Dashboard@dashboard');

//academic years
Route::get('/academic_year','Institute@academic_year');
Route::get('/set_current_year/{id}','Institute@set_current_year');
Route::post('/academic_year','Institute@academic_year_save');
Route::get('/delete_academic_year/{id}','Institute@delete_academic_year');

//classes
Route::get('/classes','Classes@list');
Route::get('/classes/add','Classes@add');
Route::post('/classes/save','Classes@save');
Route::post('/classes/save_updates','Classes@save_updates');
Route::post('/classes/save_assigned_subjects','Classes@save_assigned_subjects');
Route::post('/classes/save_assigned_groups','Classes@save_assigned_groups');
Route::get('/classes/edit/{id}','Classes@edit');
Route::get('/classes/delete/{id}','Classes@delete');
Route::get('/classes/assign_subjects/{id}','Classes@assign_subjects');
Route::get('/classes/assign_groups/{id}','Classes@assign_groups');

//Row Subjects
Route::get('/row_subjects','RowSubjects@list');
Route::get('/row_subjects/add','RowSubjects@add');
Route::get('/row_subjects/edit/{id}','RowSubjects@edit');
Route::post('/row_subjects/update','RowSubjects@update');
Route::post('/row_subjects/save','RowSubjects@save');
Route::get('/row_subjects/delete/{id}','RowSubjects@delete');

// subject groups
Route::get('/subject_groups','SubjectGroups@list');
Route::get('/subject_groups/add','SubjectGroups@add');
Route::post('/subject_groups/save','SubjectGroups@save');
Route::post('/subject_groups/save_updates','SubjectGroups@save_updates');
Route::get('/subject_groups/edit/{id}','SubjectGroups@edit');
Route::get('/subject_groups/delete/{id}','SubjectGroups@delete');
Route::get('/subject_groups/assign_subjects/{id}','SubjectGroups@assign_subject');
Route::post('/subject_groups/save_assigned_subjects','SubjectGroups@save_assigned_subjects');

//assigned subjcts to the group
Route::get('/subject_groups/assigned_subjects','SubjectGroups@assigned_subjects');
Route::post('/subject_groups/assigned_subjects/save','SubjectGroups@save_assigned_subjects');

//parent
Route::get("/parent","Parents@list");
Route::get("/parent/add","Parents@form");
Route::post("/parent/save","Parents@save");
Route::get("/parent/edit/{id}","Parents@edit");
Route::get("/parent/profile/{id}","Parents@profile");
Route::post("/parent/update","Parents@update");
Route::get("/parent/delete/{id}","Parents@delete");


//Teachers
Route::get("/teacher","Teachers@list");
Route::get("/teacher/add","Teachers@add");
Route::post("/teacher/save","Teachers@save");
Route::get("/teacher/edit/{id}","Teachers@edit");
Route::post("/teacher/update","Teachers@update");
Route::get("/teacher/delete/{id}","Teachers@delete");
Route::get("/teacher/assign_to_class/{id}","Teachers@assignToClass");
Route::post("/teacher/assign_to_class/","Teachers@saveAssignToClass");
Route::post("/teacher/assign_class_update/","Teachers@AssignClassUpdate");
Route::post("/teacher/leave_to_class/","Teachers@leaveClass");

//Students
Route::get("/student","Students@list");
Route::get("/student/add","Students@add");
Route::post("/student/save","Students@save");
Route::get("/student/edit/{id}","Students@edit");
Route::post("/student/update","Students@update");
Route::get("/student/delete/{id}","Students@delete");
Route::get("/student/class/{id}",'Students@class');
Route::get('//student/load_optional_subjects','Students@load_optional_subjects');
Route::post("/student/save_class",'Students@save_class');
Route::get("/student/pending_admissions","Students@pending_admissions");
Route::get("/student/all","Students@all_students");
Route::post('/student/class/update','Students@class_update');
Route::post('/student/update','Students@update');
Route::get("/student/profile/{id}","Students@profile");
Route::get("/student/profile/{id}/{all}","Students@profile_all");


//calendar
Route::get("/calendar","Calendar@view");
Route::get("/calendar/event_type","Calendar@event_type");
Route::get("/calendar/add_event","Calendar@add_event");
Route::post("/calendar/event_type/save","Calendar@save_event_type");
Route::post("/calendar/event_type/update","Calendar@update_event_type");
Route::get("/calendar/event_type/delete/{id}",'Calendar@delete_event_type');

//event routes
Route::post("/calendar/event/save/","Calendar@saveEvent");
Route::post("/calendar/event/update/","Calendar@updateEvent");
Route::get("/calendar/event/delete/{id}","Calendar@deleteEvent");
//get calendar json
Route::get("/calendar/event/json","Calendar@json");
