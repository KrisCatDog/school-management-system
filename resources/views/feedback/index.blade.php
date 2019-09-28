@section('title', 'Create Student')
@extends('layouts.app')

@section('content')


<div class="card">

    <div class="card-header d-flex align-items-center justify-content-between">
        Give US Feedback! :)
        {{-- <a href="{{ route('feedback.index') }}" class="btn btn-gd-info">Back</a> --}}
    </div>

    <div class="card-body">
        @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session()->get('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        <form action="{{ route('feedbacks.store') }}" method="POST">
            @include('feedback.form')
            <div class="form-group mb-0 row">
                <div class="col-md-10 offset-1">
                    <button type="submit" class="btn btn-gd-success">
                        Kirim
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection