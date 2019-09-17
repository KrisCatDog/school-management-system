@section('title', 'Daily Attendance')
@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span class="h5 mb-0"><i class="fas fa-chart-pie"></i> Attendance</span>
        {{-- <a href="{{ route('users.create') }}" class="btn btn-outline-light">Create User</a> --}}
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
                <form action="{{ route('attendances.store') }}" method="post">
                    @csrf
                    @php $index = 1 @endphp
                    @foreach ($students as $student)
                    <tr>
                        <th scope="row">{{ $index }}</th>
                        <td>{{ $student->user->name }}</td>
                        <td>
                            <select name="status[]" id="status" class="form-control-sm">
                                <option value="1">Attend</option>
                                <option value="2">Sick</option>
                                <option value="3">Absent</option>
                            </select>
                        </td>
                        <input type="hidden" name="user_id[]" value="{{ $student->id }}">
                        <input type="hidden" name="class_id[]" value="{{ $student->class_id }}">
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
                </form>
            </tbody>
        </table>
    </div>
</div>

@endsection