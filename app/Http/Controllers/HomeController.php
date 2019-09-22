<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Student;
use App\Subject;
use App\Teacher;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $attendances = Attendance::whereDay('created_at', now()->format('d'))->whereMonth('created_at', now()->format("m"))->get();
        $totalStudents = Student::all()->count();
        $totalTeachers = Teacher::all()->count();
        $totalSubjects = Subject::all()->count();

        return view('home', compact('attendances', 'totalStudents', 'totalTeachers', 'totalSubjects'));
    }
}
