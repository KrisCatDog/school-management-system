@section('title', 'Teachers')
@extends('layouts.app')

@section('content')

<h5 class="py-3"><i class="fas fa-user-friends shadow-sm"></i> <b>Teachers</b></h5>
<div class="card">
    <div class="card-header bg-green-lime-reverse d-flex justify-content-between align-items-center">
        <span class="h5 mb-0"><i class="fas fa-user-friends"></i> Teacher List</span>
        @if (Auth::user()->role_id == 1)
        <a href="{{ route('teachers.create') }}" class="btn btn-outline-success btn-lg">Create Teacher</a>
        @endif
    </div>

    <div class="card-body">
        <table class="table table-hover table-borderless table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col" style="width: 20%">Name</th>
                    <th scope="col">Address</th>
                    @if (Auth::user()->role_id == 1)
                    <th scope="col">Action</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @php $index = 1 @endphp
                @forelse ($teachers as $teacher)
                <tr>
                    <th scope="row">{{ $index }}</th>
                    <td>{{ $teacher->user->name }}</td>
                    <td>{{ $teacher->address }}</td>
                    @if (Auth::user()->role_id == 1)
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
                    @endif
                </tr>
                @php $index++ @endphp
                @empty
                <tr>
                    <td style="width: 100%">No teacher yet!</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection