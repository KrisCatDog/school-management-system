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
        $classes = auth()->user()->teacher->classes()->get();
        $subjects = auth()->user()->teacher->subjects()->get();
        $months = $this->monthsData();;

        return view('attendance.index', compact('classes', 'subjects', 'months'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (request('class_id') == null) {
            session()->flash('twoTimesError', 'Pilih Kelas Terlebih Dulu!');

            return back();
        }

        if (request('subject_id') == null) {
            session()->flash('twoTimesError', 'Pilih Mapel Terlebih Dulu!');

            return back();
        }

        $validatedData = Attendance::whereDate('created_at', now()->format("Y-m-d"))
            ->where('class_id', request()->class_id)
            ->where('subject_id', request()->subject_id)
            ->get();

        if ($validatedData->count() > 0) {
            session()->flash('twoTimesError', 'Tidak Bisa Melakukan Absen 2 Kali!');

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
                'teacher_id' => auth()->user()->teacher->id,
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
        if (request('class_id') == null) {
            session()->flash('emptyError', 'Pilih Kelas Terlebih Dulu!');

            return back();
        }

        if (request('subject_id') == null) {
            session()->flash('emptyError', 'Pilih Mapel Terlebih Dulu!');

            return back();
        }

        if (request('month_id') == null) {
            session()->flash('emptyError', 'Pilih Bulan Terlebih Dulu!');

            return back();
        }

        $students = Student::with('attendances')->where('class_id', request('class_id'))->get();
        $class = MyClass::findOrFail(request('class_id'));
        $subject = Subject::findOrFail(request('subject_id'));
        $month = $this->monthsData()[request('month_id') - 1]['name'];

        // if ($students->count() == 0 || $students->first()->attendances->where('subject_id', request()->subject_id)->count() == 0) {
        //     session()->flash('emptyError', 'Kelas Belum Memiliki Data Absen!');

        //     return back();
        // }

        return view('attendance.show', compact('students', 'class', 'subject', 'month'));
    }

    private function monthsData()
    {
        return collect([
            [
                "id" => 1,
                'name' => 'January'
            ],
            [
                "id" => 2,
                'name' => 'February'
            ],
            [
                "id" => 3,
                'name' => 'March'
            ],
            [
                "id" => 4,
                'name' => 'April'
            ],
            [
                "id" => 5,
                'name' => 'May'
            ],
            [
                "id" => 6,
                'name' => 'June'
            ],
            [
                "id" => 7,
                'name' => 'July'
            ],
            [
                "id" => 8,
                'name' => 'August'
            ],
            [
                "id" => 9,
                'name' => 'September'
            ],
            [
                "id" => 10,
                'name' => 'October'
            ],
            [
                "id" => 11,
                'name' => 'November'
            ],
            [
                "id" => 12,
                'name' => 'December'
            ],
        ]);
    }
}
