<?php

namespace App\Http\Controllers;

use App\MyClass;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = MyClass::all()->sortBy('name');

        return view('class.index', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $class = new MyClass();

        return view('class.create', compact('class'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        MyClass::create($this->validateRequest($request));

        return redirect(route('classes.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MyClass  $myClass
     * @return \Illuminate\Http\Response
     */
    public function show(MyClass $class)
    {
        return view('class.show', compact('class'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MyClass  $myClass
     * @return \Illuminate\Http\Response
     */
    public function edit(MyClass $class)
    {
        return view('class.edit', compact('class'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MyClass  $myClass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MyClass $class)
    {
        $class->update($this->validateRequest($request));

        return redirect(route('classes.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MyClass  $myClass
     * @return \Illuminate\Http\Response
     */
    public function destroy(MyClass $class)
    {
        $class->delete();

        return back();
    }

    private function validateRequest($request)
    {
        return $request->validate([
            'name' => 'required',
        ]);
    }
}
