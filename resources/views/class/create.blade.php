@section('title', 'Create Class')
@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
        Create Class
        <a href="{{ route('classes.index') }}" class="btn btn-outline-info">Back</a>
    </div>

    <div class="card-body">
        <form action="{{ route('classes.store') }}" method="POST">
            @include('class.form')
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