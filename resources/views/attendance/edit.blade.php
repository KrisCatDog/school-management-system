@section('title', 'Edit Attendance')
@extends('layouts.app')

@section('content')

<h5 class="pb-4"><i class="fas fa-chart-pie shadow-sm"></i> <b>Edit Attendance</b></h5>
<div class="card">

    <div class="card-header d-flex justify-content-between align-items-center bg-green">
        <span class="h5 mb-0"><i class="fas fa-door-open"></i> <b> {{ $class->name }}</b>
        </span>
        <span class="h5 mb-0"><i class="far fa-clock"></i>
            <b>{{ $d . " " . $month }}</b> </span>
        <span class="h5 mb-0"><i class="fas fa-book-reader"></i> <b>{{ $subject->name }}</b> </span>
    </div>

    <div class="card-body">
        <table class="table table-hover table-borderless table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col" style="width: 40%">Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <form action="{{ route('attendances.update-attendance') }}" method="post">
                    @method('PATCH')
                    @csrf
                    @php $index = 1 @endphp
                    @foreach ($students as $student) <tr>
                        <th scope="row">{{ $index }}</th>
                        <td>{{ $student->user->name }}</td>
                        <td>
                            <select name="status[]" id="status" class="form-control-sm">
                                <option value="1" @if ($student->attendances->where('status', 'Attend')
                                    ->where('created_at', $m . "-" . $d)->where('subject_id',
                                    request('subject_id'))->first())
                                    selected
                                    @endif>
                                    Attend</option>
                                <option value="2" @if ($student->attendances->where('status', 'Sick')
                                    ->where('created_at', $m . "-" . $d)->where('subject_id',
                                    request('subject_id'))->first())
                                    selected
                                    @endif>Sick</option>
                                <option value="3" @if ($student->attendances->where('status', 'Absent')
                                    ->where('created_at', $m . "-" . $d)->where('subject_id',
                                    request('subject_id'))->first())
                                    selected
                                    @endif>Absent</option>
                            </select>
                        </td>
                        <input type="hidden" name="id[]" value="{{ $student->attendances->where('created_at', $m . "-" . $d)->where('subject_id',
                        request('subject_id'))->first()->id }}">
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