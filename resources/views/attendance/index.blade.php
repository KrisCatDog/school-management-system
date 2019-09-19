@section('title', 'Attendances')
@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span class="h5 mb-0"><i class="fas fa-chart-pie"></i> Attendance</span>
    </div>

    <div class="card-body">
        @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session()->get('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <form action="{{ route('attendances.show-attendance') }}">
            <select name="class_id" id="class_id" class="form-control-lg">
                <option disabled selected>Select Class</option>
                @foreach ($classes as $class)
                <option value="{{ $class->id }}">{{ $class->name }}</option>
                @endforeach
            </select>
            <select name="subject_id" id="subject_id" class="form-control-lg">
                <option disabled selected>Select Subject</option>
                @foreach ($subjects as $subject)
                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                @endforeach
            </select>
            <button class="btn btn-outline-success btn-lg ml-2" type="submit">Show Attendance</button>
        </form>
        <form action="{{ route('attendances.create') }}" class="mt-3">
            <select name="class_id" id="class" class="form-control-lg">
                <option disabled selected>Select Class</option>
                @foreach ($classes as $class)
                <option value="{{ $class->id }}">{{ $class->name }}</option>
                @endforeach
            </select>
            <select name="subject_id" id="subject_id" class="form-control-lg">
                <option disabled selected>Select Subject</option>
                @foreach ($subjects as $subject)
                <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                @endforeach
            </select>
            <button class="btn btn-outline-success btn-lg ml-2">Create Attendance</button>
        </form>
        <table class="table table-hover table-borderless table-striped">
            {{-- <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col" style="width: 40%">Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody> --}}
            {{-- <form action="{{ route('attendances.store') }}" method="post">
            @csrf
            @php $index = 1 @endphp
            @foreach ($users as $user)
            <tr>
                <th scope="row">{{ $index }}</th>
                <td>{{ $user->name }}</td>
                <td>
                    <select name="status[]" id="status" class="form-control-sm">
                        <option value="1">Attend</option>
                        <option value="2">Sick</option>
                        <option value="3">Absent</option>
                    </select>
                </td>
                <td><input type="hidden" name="user_id[]" value="{{ $user->id }}"></td>
            </tr>
            @php $index++ @endphp
            @endforeach
            <tr>
                <td></td>
                <td></td>
                <td>
                    <button type="submit" class="btn btn-outline-success">Submit</button>
                </td>
            </tr>
            </form> --}}
            </tbody>
        </table>
    </div>
</div>

@endsection