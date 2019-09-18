@section('title', 'Teachers')
@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span class="h5 mb-0"><i class="fas fa-user-friends"></i> Teachers</span>
        <a href="{{ route('teachers.create') }}" class="btn btn-outline-primary">Create Teacher</a>
    </div>

    <div class="card-body">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col" style="width: 20%">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @php $index = 1 @endphp
                @foreach ($teachers as $teacher)
                <tr>
                    <th scope="row">{{ $index }}</th>
                    <td>{{ $teacher->user->name }}</td>
                    <td>{{ $teacher->address }}</td>
                    <td>
                        <a href="{{ route('teachers.show', ['teacher' => $teacher]) }}"
                            class="btn btn-outline-info btn-sm">Detail</a>
                        <a href="{{ route('teachers.edit', ['teacher' => $teacher]) }}"
                            class="btn btn-outline-success btn-sm">Edit</a>
                        <form action="{{ route('teachers.destroy', ['teacher' => $teacher]) }}" method="post"
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