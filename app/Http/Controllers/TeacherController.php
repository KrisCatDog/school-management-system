<?php

namespace App\Http\Controllers;

use App\Teacher;
use App\User;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::with('user')->get();

        return view('teacher.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teacher = new Teacher();

        return view('teacher.create', compact('teacher'));
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
            'role_id' => 3,
        ];

        $user = User::create($userData);

        $teacherData = [
            'user_id' => $user->id,
            'address' => $validatedData['address'],
        ];

        Teacher::create($teacherData);

        return redirect(route('teachers.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        return view('teacher.show', compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        return view('teacher.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $teacher->user_id,
            'password' => 'required|confirmed|min:6',
            'address' => 'required',
        ]);

        $userData = [
            'name' => $validatedData['name'],
            'email' =>  $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'role_id' => 3,
        ];

        $user = User::find($teacher->user_id);

        $user->update($userData);

        $teacherData = [
            'user_id' => $user->id,
            'address' => $validatedData['address'],
        ];

        $teacher->update($teacherData);

        return redirect(route('teachers.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();

        return redirect(route('teachers.index'));
    }
}