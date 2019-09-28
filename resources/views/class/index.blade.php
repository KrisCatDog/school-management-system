@section('title', 'Classes')
@extends('layouts.app')

@section('content')

<h5 class="py-3"><i class="fas fa-door-open shadow-sm"></i> <b>Classes</b></h5>
<div class="card">
    <div class="card-header bg-green-lime-reverse d-flex justify-content-between align-items-center">
        <span class="h5 mb-0"> <i class="fas fa-door-open"></i> Class List</a></span>
        {{-- <a href="{{ route('users.create') }}" class="btn btn-outline-light">Create User</a> --}}
    </div>

    <div class="card-body">
        <table class="table table-hover table-borderless table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col" style="width: 40%">Name</th>
                    @if (Auth::user()->role_id == 1)
                    <th scope="col">Action</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @php $index = 1 @endphp
                @forelse ($classes as $class)
                <tr>
                    <th scope="row">{{ $index }}</th>
                    <td>{{ $class->name }}</td>
                    @if (Auth::user()->role_id == 1)
                    <td>
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
                    </td>
                    @endif
                </tr>
                @php $index++ @endphp
                @empty
                <tr>
                    <td style="width: 100%">No class yet!</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection