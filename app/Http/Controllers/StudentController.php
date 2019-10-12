<?php

namespace App\Http\Controllers;

use App\MyClass;
use App\Student;
use App\User;
use Illuminate\Http\Request;
use DataTables;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = Student::with('user', 'class')->get()->sortBy('user.name');

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $detail = '<a href="' . route("students.show", ["student" => $data]) . '" class="btn btn-outline-info btn-sm d-inline mr-1">Detail</a>';
                    $edit = '<a href="' . route("students.edit", ["student" => $data]) . '" class="btn btn-outline-success btn-sm d-inline">Edit</a>';
                    $delete = '<form action="' . route("students.destroy", ["student" => $data]) . '" method="post" class="d-inline"> ' . csrf_field() . method_field("DELETE") . ' <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button> </form>';
                    return $detail . $edit . $delete;
                })
                ->rawColumns(['action'])
                ->editColumn('class.name', function ($value) {
                    return $value->class->name ?? 'Unknown Class';
                })
                ->make(true);
        }

        return view('student.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Student::class);

        $student = new Student();
        $classes = MyClass::all()->sortBy('name');

        return view('student.create', compact('student', 'classes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Student::class);

        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
            'address' => 'required',
            'class_id' => 'required',
        ]);

        $userData = [
            'name' => $validatedData['name'],
            'email' =>  $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'role_id' => 2,
        ];

        $user = User::create($userData);

        $studentData = [
            'user_id' => $user->id,
            'address' => $validatedData['address'],
            'class_id' => $validatedData['class_id'],
        ];

        Student::create($studentData);

        return redirect(route('students.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        $student->load('user')->load('class');

        return view('student.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $this->authorize('update', $student);

        $classes = MyClass::all()->sortBy('name');

        return view('student.edit', compact('student', 'classes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $this->authorize('update', $student);

        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $student->user_id,
            'address' => 'required',
            'class_id' => 'required',
        ]);

        $userData = [
            'name' => $validatedData['name'],
            'email' =>  $validatedData['email'],
            'role_id' => 2,
        ];

        $user = User::find($student->user_id);

        $user->update($userData);

        $studentData = [
            'user_id' => $user->id,
            'address' => $validatedData['address'],
            'class_id' => $validatedData['class_id'],
        ];

        $student->update($studentData);

        return redirect(route('students.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $this->authorize('delete', $student);

        $student->delete();

        return back();
    }
}
