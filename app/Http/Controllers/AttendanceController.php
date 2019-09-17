<?php

namespace App\Http\Controllers;

use App\Attendance;
use App\MyClass;
use App\Student;
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

        return view('attendance.index', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $validateDate = Attendance::whereDate('created_at', now()->format("Y-m-d"))->get();

        // if ($validateDate->count() > 0) {
        //     session()->flash('error', 'Tidak Bisa Melakukan Absen 2 Kali');

        //     return redirect()->back();
        // }

        $students = Student::where('class_id', request()->class)->get();

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
        $students = Student::with('attendances')->where('class_id', request()->class)->get();

        if ($students->count() == 0 || $students->first()->attendances->count() == 0) {
            abort(404);
        }

        return view('attendance.show', compact('students'));
    }
}
