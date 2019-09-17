@section('title', 'Show Attendances')
@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span class="h5 mb-0"><i class="fas fa-chart-pie"></i> Attendance</span>
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

                @csrf
                @php $index = 1 @endphp
                @foreach ($students as $student)
                <tr>
                    <th scope="row">{{ $index }}</th>
                    <td>{{ $student->user->name }}</td>
                    {{-- @foreach ($student->attendances as $attendance) --}}
                    <td>{{ $student->attendances->first()->status }}</td>
                    {{-- @endforeach --}}
                </tr>
                @php $index++ @endphp
                @endforeach
                <tr>
                    <td>

                        <a href="{{ route('attendances.index') }}" class="btn btn-outline-success">Back</a>
                    </td>
            </tbody>
        </table>
    </div>
</div>

@endsection