@section('title', 'Users')
@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header bg-green-normal d-flex justify-content-between align-items-center">
        <span class="h5"><i class="fas fa-users"></i> Users</span>
        <a href="{{ route('user.create') }}" class="btn btn-outline-light">Create User</a>
    </div>

    <div class="card-body">
        <table class="table table-hover table-borderless table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col" style="width: 40%">Name</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @php $index = 1 @endphp
                @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $index }}</th>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->role_id }}</td>
                    <td>
                        <a href="{{ route('user.show', ['user' => $user]) }}"
                            class="btn btn-outline-info btn-sm">Detail</a>
                        <a href="{{ route('user.edit', ['user' => $user]) }}"
                            class="btn btn-outline-success btn-sm">Edit</a>
                        <form action="{{ route('user.destroy', ['user' => $user]) }}" method="post"
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