<?php

namespace App\Http\Controllers;

use App\MyClass;
use App\Role;
use App\Student;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::with('user')->get();

        return view('student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
            'address' => 'required',
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
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $student->user_id,
            'password' => 'required|confirmed|min:6',
            'address' => 'required',
        ]);

        $userData = [
            'name' => $validatedData['name'],
            'email' =>  $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'role_id' => 2,
        ];

        $user = User::find($student->user_id);

        $user->update($userData);

        $studentData = [
            'user_id' => $user->id,
            'address' => $validatedData['address'],
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
        $student->delete();

        return redirect(route('students.index'));
    }
}