@section('title', 'Class | ' . $class->name)
@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">Class ID : <b>{{ $class->id }}</b></div>

    <div class="card-body">
        <h3 class="card-title">{{ $class->name }}</h3>
        <ul class="flex-grow-1 mt-4">
            <h5 class="card-subtitle mb-2 text-muted">Students in This Class</h5>
            @foreach ($class->students as $student)
            <li class="card-text">{{ $student->user->name }}</li>
            @endforeach
        </ul>
        <a href="{{ route('classes.index') }}" class="card-link btn btn-outline-success">Back</a>
    </div>

</div>

@endsection