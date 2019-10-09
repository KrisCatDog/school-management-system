@section('title', 'Edit Profile')
@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
        Edit Profile
        <a href="{{ route('home') }}" class="btn btn-gd-info">Back</a>
    </div>

    <div class="card-body">
        <form action="{{ route('users.update', ['user' => $user]) }}" method="POST">
            @method('PATCH')
            @csrf
            @if (auth()->user()->role_id == 2)
            @include('user.student-form')

            @else
            @include('user.teacher-form')
            @endif

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