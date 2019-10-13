@section('title', 'Student Scores')
@extends('layouts.app')

@section('content')

<h5 class="pb-4"><i class="fas fa-chart-pie shadow-sm"></i> <b>Student Scores</b></h5>

@if ($classes->count() > 0 || $subjects->count() > 0)
@if (Auth::user()->role_id == 3)
<div class="card">
    <div class="card-header bg-green-lime-reverse d-flex justify-content-between align-items-center">
        <span class="h5 mb-0">Create Scores</span>
    </div>

    <div class="card-body">
        @if (session()->has('create'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session()->get('create') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <form action="{{ route('scores.create') }}" method="GET">
            <select name="class_id" id="class" class="form-control-lg">
                <option disabled selected>Select Class</option>
                @foreach ($classes as $class)
                <option value="{{ $class->id }}">{{ $class->name }}</option>
                @endforeach
            </select>
            <select name="subject_id" id="subject_id" class="form-control-lg">
                <option disabled selected>Select Subject</option>
                @foreach ($subjects as $subject)
                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                @endforeach
            </select>
            <select name="semester" id="semester" class="form-control-lg">
                <option disabled selected>Select Semester</option>
                <option value="1">1</option>
                <option value="2">2</option>
            </select>
            <button class="btn btn-gd-success btn-lg ml-2">Create</button>
        </form>
    </div>
</div>
@else
<div class="card-header bg-green-lime-reverse d-flex justify-content-between align-items-center">
    <span class="h5 mb-0">Admin can't create Score!</span>
</div>
@endif

<div class="card mt-5">
    <div class="card-header bg-green-lime-reverse d-flex justify-content-between align-items-center">
        <span class="h5 mb-0">Show Scores</span>
    </div>

    <div class="card-body">
        @if (session()->has('show'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session()->get('show') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <form action="{{ route('scores.show-score') }}">
            <select name="class_id" id="class_id" class="form-control-lg">
                <option disabled selected>Select Class</option>
                @foreach ($classes as $class)
                <option value="{{ $class->id }}">{{ $class->name }}</option>
                @endforeach
            </select>
            <select name="subject_id" id="subject_id" class="form-control-lg">
                <option disabled selected>Select Subject</option>
                @foreach ($subjects as $subject)
                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                @endforeach
            </select>
            <select name="semester" id="semester" class="form-control-lg">
                <option disabled selected>Select Semester</option>
                <option value="1">1</option>
                <option value="2">2</option>
            </select>
            <button class="btn btn-gd-success btn-lg ml-2" type="submit">Show</button>
        </form>
    </div>
</div>

{{-- @if (Auth::user()->role_id == 1) --}}
<div class="card mt-5">
    <div class="card-header bg-green-lime-reverse d-flex justify-content-between align-items-center">
        <span class="h5 mb-0">Edit Scores</span>
    </div>

    <div class="card-body">
        @if (session()->has('edit'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session()->get('edit') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <form action="{{ route('scores.edit-score') }}">
            <select name="class_id" id="class_id" class="form-control-lg">
                <option disabled selected>Select Class</option>
                @foreach ($classes as $class)
                <option value="{{ $class->id }}">{{ $class->name }}</option>
                @endforeach
            </select>
            <select name="subject_id" id="subject_id" class="form-control-lg">
                <option disabled selected>Select Subject</option>
                @foreach ($subjects as $subject)
                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                @endforeach
            </select>
            <select name="semester" id="semester" class="form-control-lg">
                <option disabled selected>Select Semester</option>
                <option value="1">1</option>
                <option value="2">2</option>
            </select>
            <button class="btn btn-gd-success btn-lg ml-2" type="submit">Edit</button>
        </form>
    </div>
</div>
{{-- @endif --}}
@else
<div class="card-header bg-green-lime-reverse d-flex justify-content-between align-items-center">
    <span class="h5 mb-0">You don't have any Class or Subject!</span>
</div>
@endif


@endsection