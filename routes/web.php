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
Route::get('/blank','Dashboard@blank');
Route::get('/institute_setup','Institute@institute_setup');
Route::get('/academic_year','Institute@academic_year');
Route::post('/academic_year','Institute@academic_year_save');
Route::post('/update_institute_details','Institute@update_institute_details');
Route::get('/delete_academic_year/{id}','Institute@delete_academic_year');
Auth::routes();
Route::get('/dashboard','Dashboard@dashboard');
Route::get('/home', 'HomeController@index')->name('home');

