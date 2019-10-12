@section('title', 'Subject | ' . $subject->name)
@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">Subject ID : <b>{{ $subject->id }}</b></div>

    <div class="card-body">
        <h3 class="card-title">{{ $subject->name }}</h3>

        <a href="{{ route('subjects.index') }}" class="card-link btn btn-outline-success">Back</a>
    </div>

</div>

@endsection