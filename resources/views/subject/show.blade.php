@section('title', 'Subject | ' . $subject->name)
@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">Subject ID : <b>{{ $subject->id }}</b></div>

    <div class="card-body">
        <h3 class="card-title">{{ $subject->name }}</h3>
        {{-- <ul class="flex-grow-1 mt-4">
            <h5 class="card-subtitle mb-2 text-muted">Classes with This Subject</h5>
            @foreach ($subject->classes as $class)
            <li class="card-text">{{ $class->name }}</li>
        @endforeach
        </ul> --}}
        <a href="{{ route('subjects.index') }}" class="card-link btn btn-outline-success">Back</a>
    </div>

</div>

@endsection