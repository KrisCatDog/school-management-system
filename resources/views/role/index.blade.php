@section('title', 'Roles')
@extends('layouts.app')

@section('content')

<h5 class="py-3"><i class="fas fa-layer-group shadow-sm"></i> <b>Roles</b></h5>
<div class="card">
    <div class="card-header bg-green-lime-reverse d-flex justify-content-between align-items-center">
        <span class="h5 mb-0"> <i class="fas fa-layer-group"></i> Role List</a></span>
        {{-- <a href="{{ route('users.create') }}" class="btn btn-outline-light">Create User</a> --}}
    </div>

    <div class="card-body">
        <table class="table table-hover table-borderless table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    {{-- <th scope="col">Action</th> --}}
                </tr>
            </thead>
            <tbody>
                @php $index = 1 @endphp
                @forelse ($roles as $role)
                <tr>
                    <th scope="row">{{ $index }}</th>
                    <td>{{ $role->name }}</td>
                    {{-- <td>
                        <a href="{{ route('classes.show', ['class' => $class]) }}"
                    class="btn btn-outline-info btn-sm">Detail</a>
                    <a href="{{ route('classes.edit', ['class' => $class]) }}"
                        class="btn btn-outline-success btn-sm">Edit</a>
                    <form action="{{ route('classes.destroy', ['class' => $class]) }}" method="post"
                        class="inline custom-control-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                    </form>
                    </td> --}}
                </tr>
                @php $index++ @endphp
                @empty
                <tr>
                    <td style="width: 100%">No role yet!</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection