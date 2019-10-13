<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\Student;
use App\Subject;
use App\Teacher;
use Illuminate\Http\Request;
use DataTables;

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
        $mostAbsentStudents = Attendance::with('student', 'student.user', 'student.class')->where('status', 3)->get()->unique('student_id')->count();
        $attendStudents = $this->todayAttendance()->where('status', 1)->get()->unique('student_id');
        $sickStudents = $this->todayAttendance()->where('status', 2)->get()->unique('student_id');
        $absentStudents = $this->todayAttendance()->where('status', 3)->get()->unique('student_id');
        $totalStudents = Student::all()->count();
        $totalTeachers = Teacher::all()->count();
        $totalSubjects = Subject::all()->count();

        return view('dashboard.home', compact(
            'attendances',
            'mostAbsentStudents',
            'totalStudents',
            'totalTeachers',
            'totalSubjects',
            'sickStudents',
            'absentStudents',
            'attendStudents'
        ));
    }

    public function studentsNotAttend(Request $request)
    {
        if ($request->ajax()) {
            $sick = $this->todayAttendance()->with('student', 'student.user', 'student.class')->where('status', 2)->get()->unique('student_id')->sortBy('student.user.name');
            $absent = $this->todayAttendance()->with('student', 'student.user', 'student.class')->where('status', 3)->get()->unique('student_id')->sortBy('student.user.name');

            $data = $sick->merge($absent);

            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('status', function ($value) {
                    return $value->status;
                })
                ->make(true);
        }

        return view('dashboard.students-not-attend');
    }

    public function todayAttendance()
    {
        return Attendance::whereDay('created_at', now()->format('d'))->whereMonth('created_at', now()->format("m"));
    }

    public function studentsMostAbsent(Request $request)
    {

        $data = Attendance::with('student', 'student.user', 'student.class')->where('status', 3)->get()->unique('student_id');

        // dd($data->where('student.id', $data->student->id));

        if ($request->ajax()) {
            return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('status', function ($value) {
                    return $value->status;
                })
                ->editColumn('total', function ($value) {
                    return $value->where('student_id', $value->student->id)->count();
                })
                ->make(true);
        }

        return view('dashboard.students-most-absent');
    }
}
