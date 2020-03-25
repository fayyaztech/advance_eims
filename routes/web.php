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

//teacher urls
Route::get('/add_teacher','Teachers@add_teacher_form');
Route::get('/teachers','Teachers@teachers');
Route::post('/save_teacher','Teachers@save_teacher');
Route::get('/delete_teacher/{id}','Teachers@delete_teacher');
Route::get('/edit_teacher/{id}','Teachers@edit_teacher');
Route::post('/update_teacher','Teachers@update_teacher');

//Section Routes
Route::get('/sections','Section@view');
Route::post('/sections/save','Section@save');
Route::post('/sections/save_updates','Section@save_updates');
Route::get('/sections/add','Section@add');
Route::get('/sections/edit/{id}','Section@edit');
Route::get('/sections/delete/{id}','Section@delete');

// Row Classes
Route::get('/rowclasses','RowClasses@list');
Route::get('/rowclasses/add','RowClasses@add');
Route::post('/rowclasses/save','RowClasses@save');
Route::get('/rowclasses/edit/{id}','RowClasses@edit');
Route::post('/rowclasses/save_updates','RowClasses@save_updates');
Route::get('/rowclasses/delete/{id}','RowClasses@delete');

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
Route::post('/row_subjects/save','RowSubjects@save');
Route::get('/row_subjects/delete/{id}','RowSubjects@delete');

// subject groups
Route::get('/subject_groups','subjectGroup@list');
Route::get('/subject_groups/add','subjectGroup@add');
Route::post('/subject_groups/save','subjectGroup@save');
Route::post('/subject_groups/save_updates','subjectGroup@save_updates');
Route::get('/subject_groups/edit/{id}','subjectGroup@edit');
Route::get('/subject_groups/delete/{id}','subjectGroup@delete');
Route::get('/subject_groups/assign_subjects/{id}','subjectGroup@assign_subject');
Route::post('/subject_groups/save_assigned_subjects','subjectGroup@save_assigned_subjects');

//assigned subjcts to the group
Route::get('/subject_groups/assigned_subjects','subjectGroup@assigned_subjects');
Route::post('/subject_groups/assigned_subjects/save','subjectGroup@save_assigned_subjects');

//parent
Route::get("/parent","Parents@list");
Route::get("/parent/add","Parents@form");
Route::post("/parent/save","Parents@save");
Route::get("/parent/edit/{id}","Parents@edit");
Route::post("/parent/update","Parents@update");
Route::get("/parent/delete/{id}","Parents@delete");

//Student
Route::get("/student","Students@list");
Route::get("/student/add","Students@add");
Route::post("/student/save","Students@save");
Route::get("/student/edit/{id}","Students@edit");
Route::post("/student/update","Students@update");
Route::get("/student/delete/{id}","Students@delete");
