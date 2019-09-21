@section('title', 'Students')
@extends('layouts.app')

@section('content')

<h5 class="py-3"><i class="fas fa-user-tie shadow-sm"></i> Students</h5>
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span class="h5 mb-0"><i class="fas fa-user-tie"></i> List of Students</span>
        <a href="{{ route('students.create') }}" class="btn btn-gd-info btn-lg">Create Student</a>
    </div>

    <div class="card-body">
        <table class="table table-hover table-striped table-borderless">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @php $index = 1 @endphp
                @foreach ($students as $student)
                <tr>
                    <th scope="row">{{ $index }}</th>
                    <td>{{ $student->user->name }}</td>
                    <td>{{ $student->address }}</td>
                    <td>
                        <a href="{{ route('students.show', ['student' => $student]) }}"
                            class="btn btn-outline-info btn-sm">Detail</a>
                        <a href="{{ route('students.edit', ['student' => $student]) }}"
                            class="btn btn-outline-success btn-sm">Edit</a>
                        <form action="{{ route('students.destroy', ['student' => $student]) }}" method="post"
                            class="inline custom-control-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @php $index++ @endphp
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection