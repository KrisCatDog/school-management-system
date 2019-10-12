@section('title', 'Classes')
@extends('layouts.app')

@section('content')

<h5 class="py-3"><i class="fas fa-door-open shadow-sm"></i> <b>Classes</b></h5>
<div class="card">
    <div class="card-header bg-green-lime-reverse d-flex justify-content-between align-items-center">
        <span class="h5 mb-0"> <i class="fas fa-door-open"></i> Class List</a></span>
        <a href="{{ route('classes.create') }}" class="btn btn-outline-success">Create Class</a>
    </div>

    <div class="card-body">
        <table class="table table-hover table-borderless table-striped data-table w-100">
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
            </tbody>
        </table>
    </div>
</div>

<script type="text/javascript">
    $(function () {
      var table = $('.data-table').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('classes.index') }}",
          columns: [    
              {data: 'DT_RowIndex', name: 'DT_RowIndex'},
              {data: 'name', name: 'name'},
              @if (Auth::user()->role_id == 1)
              {data: 'action', name: 'action', orderable: false, searchable: false},
              @endif
          ]
      });
    });
</script>
@endsection