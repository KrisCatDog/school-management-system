<?php

namespace App\Http\Controllers;

use App\MyClass;
use Illuminate\Http\Request;
use DataTables;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = MyClass::all()->sortBy('name');

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $detail = '<a href="' . route("classes.show", ["class" => $data]) . '" class="btn btn-outline-info btn-sm d-inline mr-1">Detail</a>';
                    $edit = '<a href="' . route("classes.edit", ["class" => $data]) . '" class="btn btn-outline-success btn-sm d-inline">Edit</a>';
                    $delete = '<form action="' . route("classes.destroy", ["class" => $data]) . '" method="post" class="d-inline"> ' . csrf_field() . method_field("DELETE") . ' <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button> </form>';
                    return $detail . $edit . $delete;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('class.index');
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
