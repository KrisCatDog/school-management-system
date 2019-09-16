@section('title', 'Edit Teacher')
@extends('layouts.app')

@section('content')

<div class="card border-success">
    <div class="card-header border-success bg-green-normal d-flex align-items-center justify-content-between">
        Edit Teacher
        <a href="{{ route('teacher.index') }}" class="btn btn-outline-primary">Back</a>
    </div>

    <div class="card-body">
        <form action="{{ route('teacher.update', ['teacher' => $teacher]) }}" method="POST">
            @include('teacher.form')
            @method('PATCH')
            <div class="form-group mb-0 row">
                <div class="col-md-10 offset-1">
                    <button type="submit" class="btn btn-success">
                        Edit
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection