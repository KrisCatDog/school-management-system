@section('title', 'Create Teacher')
@extends('layouts.app')

@section('content')

<div class="card border-success">
    <div class="card-header border-success bg-green-normal d-flex align-items-center justify-content-between">
        Create Teacher
        <a href="{{ route('teacher.index') }}" class="btn btn-outline-primary">Back</a>
    </div>

    <div class="card-body">
        <form action="{{ route('teacher.store') }}" method="POST">
            @include('teacher.form')
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