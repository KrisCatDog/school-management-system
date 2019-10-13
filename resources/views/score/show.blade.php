@section('title', 'Show Scores')
@extends('layouts.app')

@section('content')

<h5 class="pb-4"><i class="fas fa-chart-pie shadow-sm"></i> <b> Scores Data</b></h5>
<div class="card">
    <div class="card-header bg-green d-flex justify-content-between align-items-center">
        <span class="h5 mb-0"><i class="fas fa-door-open"></i> <b> {{ $class->name }}</b>
        </span>
        <span class="h5 mb-0"><i class="fas fa-user-friends"></i>
            <b>Semester {{ request('semester') }}</b>
        </span>
        <span class="h5 mb-0"><i class="fas fa-book-reader"></i> <b>{{ $subject->name }}</b> </span>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-borderless table-striped table-sm ">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">UH</th>
                        <th scope="col">UTS</th>
                        <th scope="col">UAS</th>
                    </tr>
                </thead>
                <tbody>

                    @php $index = 1; $date = 1; @endphp
                    @foreach ($students as $student)
                    <tr>
                        <th scope="row">{{ $index }}</th>
                        <td>{{ $student->user->name }}</td>
                        <td>
                            {{ $student->scores->where('semester', request('semester'))->where('subject_id', request('subject_id'))->first()->daily_exams ?? '.' }}
                        </td>
                        <td>
                            {{ $student->scores->where('semester', request('semester'))->where('subject_id', request('subject_id'))->first()->midterm_exams ?? '.' }}
                        </td>
                        <td>
                            {{ $student->scores->where('semester', request('semester'))->where('subject_id', request('subject_id'))->first()->final_exams ?? '.' }}
                        </td>
                    </tr>

                    @php $index++ @endphp
                    @endforeach
                    <tr>

                </tbody>
                <p></p>
            </table>
        </div>
        <a href="{{ route('scores.index') }}" class="btn btn-outline-success">Back</a>
    </div>
</div>

@endsection