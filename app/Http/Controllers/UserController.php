<?php

namespace App\Http\Controllers;

use App\MyClass;
use App\Subject;
use App\User;
use Illuminate\Http\Request;
use DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::with('role')->oldest('name')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->make(true);
        }

        return view('user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if ($user->role_id == 2) {
            $validatedData = $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email,' . $user->id,
                'password' => 'sometimes|confirmed',
                'address' => 'required',
                'class_id' => 'required',
                'photo' => 'sometimes|image|mimes:jpeg,png,jpg|max:2048',
                'phone_number' => 'required|numeric',
                'instagram_username' => 'required',
            ]);

            if ($request->password) {
                $request->validate([
                    'password' => 'min:6',
                ]);

                $password = ['password' => bcrypt($validatedData['password'])];
            }

            if ($request->photo) {
                $photo = ['photo' => $request->photo->store('uploads/students', 'public')];
            }

            $userData = [
                'name' => $validatedData['name'],
                'email' =>  $validatedData['email'],
                'role_id' => 2,
            ];

            $user = User::find($user->id);

            $user->update(array_merge($userData, $password ?? []));

            $studentData = [
                'user_id' => $user->id,
                'address' => $validatedData['address'],
                'class_id' => $validatedData['class_id'],
                'phone_number' => $validatedData['phone_number'],
                'instagram_username' => $validatedData['instagram_username'],
            ];

            $user->student->update(array_merge($studentData, $photo ?? []));
        }

        if ($user->role_id == 3) {
            $validatedData = $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email,' . $user->id,
                'password' => 'sometimes|confirmed',
                'address' => 'required',
                'classes' => 'required',
                'subjects' => 'required',
            ]);

            if ($request->password) {
                $password = ['password' => bcrypt($validatedData['password'])];
            }

            $userData = [
                'name' => $validatedData['name'],
                'email' =>  $validatedData['email'],
                'role_id' => 3,
            ];

            $user = User::find($user->id);

            $user->update(array_merge($userData, $password ?? []));

            $teacherData = [
                'user_id' => $user->id,
                'address' => $validatedData['address'],
            ];

            $user->teacher->update($teacherData);

            $user->teacher->classes()->sync($validatedData['classes']);
            $user->teacher->subjects()->sync($validatedData['subjects']);
        }

        return redirect(route('home'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function editProfile()
    {
        $user = auth()->user();
        $classes = MyClass::oldest('name')->get();
        $subjects = Subject::all();

        return view('user.edit-profile', compact('user', 'classes', 'subjects'));
    }
}
