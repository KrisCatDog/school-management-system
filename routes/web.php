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

Route::middleware(['auth'])->group(function () {
    Route::get('attendances/show-attendance', 'AttendanceController@showAttendance')->name('attendances.show-attendance');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('users', 'UserController');
    Route::resource('students', 'StudentController');
    Route::resource('teachers', 'TeacherController');
    Route::resource('attendances', 'AttendanceController');
    // Route::post('attendances/show-attendance', 'AttendanceController@showAttendance');
});
