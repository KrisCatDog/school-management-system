@section('title', 'Edit Score')
@extends('layouts.app')

@section('content')

<h5 class="pb-4"><i class="fas fa-chart-pie shadow-sm"></i> <b>Edit Score</b></h5>
<div class="card">

    <div class="card-header d-flex justify-content-between align-items-center bg-green">
        <span class="h5 mb-0"><i class="fas fa-door-open"></i> <b> {{ $class->name }}</b>
        </span>
        <span class="h5 mb-0"><i class="far fa-clock"></i>
            <b>{{ now()->format('l, j F Y h:i:s A') }}</b> </span>
        <span class="h5 mb-0"><i class="fas fa-book-reader"></i> <b>{{ $subject->name }}</b> </span>
    </div>

    <div class="card-body">
        <table class="table table-hover table-borderless table-striped w-100">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col" style="width: 15%">UH</th>
                    <th scope="col" style="width: 15%">UTS</th>
                    <th scope="col" style="width: 15%">UAS</th>
                </tr>
            </thead>
            <tbody>

                <form action="{{ route('scores.update-score') }}" method="post">
                    @method('PATCH')
                    @csrf
                    @php $index = 1 @endphp
                    @foreach ($students as $student)
                    {{ $errors->first() }}
                    <tr>
                        <th scope="row">{{ $index }}</th>
                        <td>{{ $student->user->name }}</td>
                        {{-- @error('daily_exams.'. ($index-1)) is-invalid @enderror --}}
                        <td><input type="text" name="daily_exams[]" class="form-control w-75"
                                value="{{ $student->scores->where('semester', request('semester'))->where('subject_id', request('subject_id'))->first()->daily_exams }}">
                        </td>
                        <td><input type="text" name="midterm_exams[]" class="form-control w-75"
                                value="{{ $student->scores->where('semester', request('semester'))->where('subject_id', request('subject_id'))->first()->midterm_exams }}">
                        </td>
                        <td><input type="text" name="final_exams[]" class="form-control w-75"
                                value="{{ $student->scores->where('semester', request('semester'))->where('subject_id', request('subject_id'))->first()->final_exams }}">
                        </td>
                        <input type="hidden" name="id[]"
                            value="{{ $student->scores->where('semester', request('semester'))->where('subject_id', request('subject_id'))->first()->id }}">
                    </tr>
                    @php $index++ @endphp
                    @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-around">
            <a href="{{ route('attendances.index') }}" class="btn btn-gd-success">Back</a>
            <button type="submit" class="btn btn-outline-success">Submit</button>
        </div>
        </form>
    </div>
</div>

@endsection