@section('title', 'Students')
@extends('layouts.app')

@section('content')

<h5 class="py-3"><i class="fas fa-user-tie shadow-sm"></i> <b>Students</b></h5>
<div class="card">
    <div class="card-header bg-green-lime-reverse d-flex justify-content-between align-items-center">
        <span class="h5 mb-0"><i class="fas fa-user-tie mr-1"></i> Student List</span>
        @if (Auth::user()->role_id == 1)
        <a href="{{ route('students.create') }}" class="btn btn-outline-success btn-lg">Create Student</a>
        @endif
    </div>

    <div class="card-body">
        <table class="table table-hover table-striped table-borderless data-table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Class</th>
                    @if (Auth::user()->role_id == 1)
                    <th scope="col">Action</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                {{-- @php $index = 1 @endphp
                @forelse ($users as $user)
                <tr>
                    <th scope="row">{{ $index }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->student->address }}</td>
                @if (Auth::user()->role_id == 1)
                <td>
                    <a href="{{ route('students.show', ['student' => $user->student]) }}"
                        class="btn btn-outline-info btn-sm">Detail</a>
                    <a href="{{ route('students.edit', ['student' => $user->student]) }}"
                        class="btn btn-outline-success btn-sm">Edit</a>
                    <form action="{{ route('students.destroy', ['student' => $user->student]) }}" method="post"
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
                    <td style="width: 100%">No student yet!</td>
                </tr>
                @endforelse --}}
            </tbody>
        </table>
        {{-- {{ $users->links() }} --}}
    </div>
</div>

<script type="text/javascript">
    $(function () {
      
      var table = $('.data-table').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('students.index') }}",
          columns: [    
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'user.name', name: 'user.name'},
              {data: 'class.name', name: 'class.name'},
              @if (Auth::user()->role_id == 1)
              {data: 'action', name: 'action', orderable: false, searchable: false},
              @endif
          ]
      });
    });
</script>
@endsection