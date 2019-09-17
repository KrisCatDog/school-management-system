@section('title', 'Teacher | ' . $teacher->user->name)
@extends('layouts.app')

@section('content')

<div class="card border-success">
    <div class="card-header border-success bg-green-normal">Teacher ID : <b>{{ $teacher->user->id }}</b></div>

    <div class="card-body">
        <h3 class="card-title">{{ $teacher->user->name }}</h3>
        <h5 class="card-subtitle mb-2 text-muted">{{ $teacher->user->email }}</h5>
        <p class="card-text">{{ $teacher->address }}</p>
        <a href="{{ route('teachers.index') }}" class="card-link btn btn-outline-success">Back</a>
    </div>

</div>

@endsection