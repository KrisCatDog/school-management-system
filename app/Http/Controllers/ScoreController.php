<?php

namespace App\Http\Controllers;

use App\MyClass;
use App\Score;
use App\Student;
use App\Subject;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    public function __construct()
    {
        $this->middleware('teacher');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->role_id == 1) {
            $classes = MyClass::oldest('name')->get();
            $subjects = Subject::oldest('name')->get();
            $types = Score::all();

            return view('score.index', compact('classes', 'subjects', 'types'));
        }

        $classes = auth()->user()->teacher->classes()->oldest('name')->get();
        $subjects = auth()->user()->teacher->subjects()->get();
        $types = auth()->user()->teacher->scores()->get();

        return view('score.index', compact('classes', 'subjects', 'types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Student::with('user')->where('class_id', request()->class_id)->get()->sortBy('user.name');

        $class = MyClass::findOrFail(request('class_id'));
        $subject = Subject::findOrFail(request('subject_id'));

        return view('score.create', compact('students', 'class', 'subject'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            // 'score_type' => 'required|unique:scores,teacher_id' . auth()->user()->teacher->id,
            'points.*' => 'nullable|numeric',
        ]);

        for ($i = 0; $i < count($request->student_id); $i++) {
            Score::create([
                'student_id' => $request->student_id[$i],
                'subject_id' => $request->subject_id,
                'score_type' => strtoupper($request->score_type),
                'point' => $request->points[$i],
                'semester' => $request->semester,
                'class_id' => $request->class_id,
                'teacher_id' => auth()->user()->teacher->id,
            ]);
        }

        return redirect(route('scores.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function show(Score $score)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function edit(Score $score)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Score $score)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Score  $score
     * @return \Illuminate\Http\Response
     */
    public function destroy(Score $score)
    {
        //
    }

    public function showScore()
    {
        $students = Student::with('scores', 'user')->where('class_id', request('class_id'))->get()->sortBy('user.name');
        $class = MyClass::findOrFail(request('class_id'));
        $subject = Subject::findOrFail(request('subject_id'));

        if ($students->count() == 0 || $students->first()->scores->where('semester', request('semester'))->where('subject_id', request('subject_id'))->count() == 0) {
            session()->flash('show', 'Kelas Tidak Memiliki Data Nilai!');

            return back();
        }

        return view('score.show', compact('students', 'class', 'subject'));
    }

    public function editScore()
    {
        $students = Student::with('scores', 'user')->where('class_id', request('class_id'))->get()->sortBy('user.name');
        $class = MyClass::findOrFail(request('class_id'));
        $subject = Subject::findOrFail(request('subject_id'));

        foreach ($students as $student) {
            if ($student->scores->where('score_type', request('score_type'))->where('subject_id', request('subject_id'))->count() == 0) {
                session()->flash('edit', 'Kelas Tidak Memiliki Data Nilai!');

                return back();
            }
        }

        return view('score.edit', compact('students', 'class', 'subject'));
    }

    public function updateScore(Request $request)
    {
        $request->validate([
            'points.*' => 'nullable|numeric',
        ]);

        for ($i = 0; $i < count($request->id); $i++) {
            $score = Score::find($request->id[$i]);

            $score->update([
                'point' => $request->points[$i],
            ]);
        }

        return redirect(route('scores.index'));
    }
}
