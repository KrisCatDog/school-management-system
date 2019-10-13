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
    Route::get('attendances/edit-attendance', 'AttendanceController@editAttendance')->name('attendances.edit-attendance');
    Route::patch('attendances/edit-attendance', 'AttendanceController@updateAttendance')->name('attendances.update-attendance');
    Route::get('scores/show-score', 'ScoreController@showScore')->name('scores.show-score');
    Route::get('scores/edit-score', 'ScoreController@editScore')->name('scores.edit-score');
    Route::patch('scores/edit-score', 'ScoreController@updateScore')->name('scores.update-score');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/home/students-not-attend', 'HomeController@studentsNotAttend')->name('home.notattend');
    Route::get('/home/students-most-absent', 'HomeController@studentsMostAbsent')->name('home.mostabsent');
    Route::get('/roles', 'RoleController@index')->name('roles.index');
    Route::get('/feedbacks', 'FeedbackController@index')->name('feedbacks.index');
    Route::post('/feedbacks', 'FeedbackController@store')->name('feedbacks.store');
    Route::get('/edit-profile', 'UserController@editProfile')->name('users.edit-profile');

    Route::resources([
        'users' => 'UserController',
        'students' => 'StudentController',
        'teachers' => 'TeacherController',
        'attendances' => 'AttendanceController',
        'classes' => 'ClassController',
        'subjects' => 'SubjectController',
        'scores' => 'ScoreController',
    ]);
});
