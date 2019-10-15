@section('title', 'Students with Lowest Scores')
@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header bg-green-lime-reverse d-flex justify-content-between align-items-center">
        <span class="h5 mb-0"><i class="fas fa-user-tie mr-1"></i> Students with Lowest Scores</span>
        <a href="{{ route('home') }}" class="btn btn-gd-info">Back</a>
    </div>

    <div class="card-body">
        <table class="table table-hover table-striped table-borderless data-table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Class</th>
                    <th scope="col">Subjects</th>
                    <th scope="col">Types</th>
                    <th scope="col">Scores</th>
                </tr>
            </thead>
            <tbody>
                @php $index = 1; @endphp
                @foreach ($scores->unique('student_id') as $score)
                <tr>
                    <td>{{ $index }}</td>
                    <td>{{ $score->student->user->name }}</td>
                    <td>{{ $score->student->class->name }}</td>
                    <td>
                        @foreach ($scores->where('student_id', $score->student->id) as $score)
                        <p>{{ $score->subject->name }}</p>
                        @endforeach
                    </td>
                    <td>
                        @foreach ($scores->where('student_id', $score->student->id) as $score)
                        <p>{{ $score->score_type }}</p>
                        @endforeach
                    </td>
                    <td>
                        @foreach ($scores->where('student_id', $score->student->id) as $score)
                        <p>{{ $score->point }}</p>
                        @endforeach
                    </td>
                </tr>
                @php $index++; @endphp
                @endforeach
            </tbody>
        </table>
    </div>
</div>

{{-- <script type="text/javascript">
    $(function () {
      var table = $('.data-table').DataTable({
          processing: true,
          serverSide: true,
          ajax: "{{ route('home.mostabsent') }}",
columns: [
{data: 'DT_RowIndex', name: 'DT_RowIndex'},
{data: 'student.user.name', name: 'student.user.name'},
{data: 'student.class.name', name: 'student.class.name'},
{data: 'total', name: 'total'},
// {data: 'student_id', name: 'student_id'},
]
});
});
</script> --}}
@endsection