@section('title', 'Create Student')
@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
        Create Student
        <a href="{{ route('students.index') }}" class="btn btn-outline-primary">Back</a>
    </div>

    <div class="card-body">
        <form action="{{ route('students.store') }}" method="POST">
            @include('student.form')
            <div class="form-group mb-0 row">
                <div class="col-md-10 offset-1">
                    <button type="submit" class="btn btn-success">
                        Create
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection