@section('title', 'Students Not Attend')
@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header bg-green-lime-reverse d-flex justify-content-between align-items-center">
        <span class="h5 mb-0"><i class="fas fa-user-tie mr-1"></i> Students Not Attend Today</span>
        <a href="{{ route('home') }}" class="btn btn-gd-info">Back</a>
    </div>

    <div class="card-body">
        <table class="table table-hover table-striped table-borderless data-table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Class</th>
                    <th scope="col">Status</th>
                    {{-- @if (Auth::user()->role_id == 1)
                    <th scope="col">Action</th>
                    @endif --}}
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

<script type="text/javascript">
    $(function () {
      var table = $('.data-table').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('home.notattend') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'student.user.name', name: 'student.user.name'},
            {data: 'student.class.name', name: 'student.class.name'},
            {data: 'status', name: 'status'},
            // {data: 'student_id', name: 'student_id'},
            ]
    });
});
</script>
@endsection