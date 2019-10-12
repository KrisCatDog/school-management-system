<?php

namespace App\Http\Controllers;

use App\Subject;
use Illuminate\Http\Request;
use DataTables;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Subject::oldest('name')->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $detail = '<a href="' . route("subjects.show", ["subject" => $data]) . '" class="btn btn-outline-info btn-sm d-inline mr-1">Detail</a>';
                    $edit = '<a href="' . route("subjects.edit", ["subject" => $data]) . '" class="btn btn-outline-success btn-sm d-inline">Edit</a>';
                    $delete = '<form action="' . route("subjects.destroy", ["subject" => $data]) . '" method="post" class="d-inline"> ' . csrf_field() . method_field("DELETE") . ' <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button> </form>';
                    return $detail . $edit . $delete;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('subject.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subject = new Subject();

        return view('subject.create', compact('subject'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Subject::create($this->validateRequest($request));

        return redirect(route('subjects.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        return view('subject.show', compact('subject'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        return view('subject.edit', compact('subject'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        $subject->update($this->validateRequest($request));

        return redirect(route('subjects.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        $subject->delete();

        return back();
    }

    private function validateRequest($request)
    {
        return $request->validate([
            'name' => 'required',
        ]);
    }
}
