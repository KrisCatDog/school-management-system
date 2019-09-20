@section('title', 'Teacher | ' . $teacher->user->name)
@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">Teacher ID : <b>{{ $teacher->user->id }}</b></div>

    <div class="card-body">
        <h3 class="card-title">{{ $teacher->user->name }}</h3>
        <h5 class="card-subtitle mb-2 text-muted">{{ $teacher->user->email }}</h5>
        <p class="card-text">{{ $teacher->address }}</p>
        <div class="d-flex flex-wrap">
            <ul class="flex-grow-1">
                <h5 class="card-subtitle mb-2 text-muted">Classes</h5>
                @foreach ($teacher->classes as $class)
                <li class="card-text">{{ $class->name }}</li>
                @endforeach
            </ul>

            <ul class="flex-grow-1">
                <h5 class="card-subtitle mb-2 text-muted">Subjects</h5>
                @foreach ($teacher->subjects as $subject)
                <li class="card-text">{{ $subject->name }}</li>
                @endforeach
            </ul>
        </div>
        <a href="{{ route('teachers.index') }}" class="card-link btn btn-outline-success">Back</a>
    </div>

</div>

@endsection