<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\MyClass;
use App\Student;
use App\Subject;
use App\User;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = MyClass::all()->sortBy('name');

        $subjects = auth()->user()->teacher->subjects()->get();

        return view('attendance.index', compact('classes', 'subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $validateData = Attendance::whereDate('created_at', now()->format("Y-m-d"))
            ->where('class_id', request()->class_id)
            ->where('subject_id', request()->subject_id)
            ->get();

        if ($validateData->count() > 0) {
            session()->flash('error', 'Tidak Bisa Melakukan Absen 2 Kali');

            return back();
        }

        $students = Student::where('class_id', request()->class_id)->get();

        return view('attendance.create', compact('students'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        for ($i = 0; $i < count($request->status); $i++) {
            Attendance::create([
                'student_id' => $request->user_id[$i],
                'teacher_id' => auth()->user()->id,
                'status' => $request->status[$i],
                'class_id' => $request->class_id[$i],
                'subject_id' => $request->subject_id[$i],
            ]);
        }

        return redirect(route('attendances.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function showAttendance()
    {
        $students = Student::with('attendances')->where('class_id', request()->class_id)->get();

        if ($students->count() == 0 || $students->first()->attendances->where('subject_id', request()->subject_id)->count() == 0) {
            abort(404);
        }

        return view('attendance.show', compact('students'));
    }
}
