@section('title', 'Create Score')
@extends('layouts.app')

@section('content')

<h5 class="pb-4"><i class="fas fa-chart-pie shadow-sm"></i> <b>Create Score</b></h5>
<div class="card">

    <div class="card-header d-flex justify-content-between align-items-center bg-green">
        <span class="h5 mb-0"><i class="fas fa-door-open"></i> <b> {{ $class->name }}</b>
        </span>
        <span class="h5 mb-0"><i class="far fa-clock"></i>
            <b>{{ now()->format('l, j F Y h:i:s A') }}</b> </span>
        <span class="h5 mb-0"><i class="fas fa-book-reader"></i> <b>{{ $subject->name }}</b> </span>
    </div>

    <div class="card-body">
        <form action="{{ route('scores.store') }}" method="post">
            <div class="d-flex align-items-center mb-2">
                <label class="m-0 mr-2">Score Type : </label>
                <input type="text" name="score_type" class="form-control w-25">
                <span class="font-italic text-success ml-2">Example : UH, UTS, UAS</span>
            </div>
            @error('score_type')
            <span class="text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <table class="table table-hover table-borderless table-striped w-100">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">POINT</th>
                    </tr>
                </thead>
                <tbody>
                    @csrf
                    @php $index = 1 @endphp
                    @foreach ($students as $student)
                    <tr>
                        <th scope="row">{{ $index }}</th>
                        <td>{{ $student->user->name }}</td>
                        <td><input type="text" name="points[]"
                                class="form-control w-25 @error('points.'. ($index-1)) is-invalid @enderror "></td>
                        <input type="hidden" name="student_id[]" value="{{ $student->id }}">
                        <input type="hidden" name="subject_id" value="{{ request()->subject_id }}">
                        <input type="hidden" name="class_id" value="{{ request()->class_id }}">
                        <input type="hidden" name="semester" value="{{ request()->semester }}">
                    </tr>
                    @php $index++ @endphp
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-around">
                <a href="{{ route('scores.index') }}" class="btn btn-gd-success">Back</a>
                <button type="submit" class="btn btn-outline-success">Submit</button>
            </div>
        </form>
    </div>
</div>

@endsection