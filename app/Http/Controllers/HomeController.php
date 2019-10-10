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
        $attendances = $this->todayAttendance()->get();
        $attendStudents = $this->todayAttendance()->where('status', 1)->get();
        $sickStudents = $this->todayAttendance()->where('status', 2)->get();
        $absentStudents = $this->todayAttendance()->where('status', 3)->get();
        $totalStudents = Student::all()->count();
        $totalTeachers = Teacher::all()->count();
        $totalSubjects = Subject::all()->count();

        return view('home', compact(
            'attendances',
            'totalStudents',
            'totalTeachers',
            'totalSubjects',
            'sickStudents',
            'absentStudents',
            'attendStudents'
        ));
    }

    public function todayAttendance()
    {
        return Attendance::whereDay('created_at', now()->format('d'))->whereMonth('created_at', now()->format("m"));
    }
}
