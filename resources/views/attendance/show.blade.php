@section('title', 'Show Attendances')
@extends('layouts.app')

@section('content')


<h5 class="pb-4"><i class="fas fa-chart-pie shadow-sm"></i> Attendances Data</h5>
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center bg-green">
        <span class="h5 mb-0"><i class="fas fa-door-open"></i> <b> {{ $class->name }}</b>
        </span>
        <span class="h5 mb-0"><i class="fas fa-moon"></i> <b>{{ $month }}</b> </span>
        <span class="h5 mb-0"><i class="fas fa-book-reader"></i> <b>{{ $subject->name }}</b> </span>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-borderless table-striped table-sm ">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        @for ($i = 1; $i <= 31; $i++) <td>{{ $i }}</td>
                            @endfor
                    </tr>
                </thead>
                <tbody>

                    @php $index = 1; $date = 1; @endphp
                    @foreach ($students as $student)
                    <tr>
                        <th scope="row">{{ $index }}</th>
                        <td>{{ $student->user->name }}</td>

                        @for ($i = 1; $i <= 31; $i++) <td>
                            {!!
                            $student->attendances->where('subject_id', request()->subject_id)->where('student_id',
                            $student->id)->where('created_at', 0 . request('month_id') . "-" . $date = ($i < 10) ? 0 .
                                $i : $i)->
                                first()->status
                                ?? "."
                                !!}
                                </td>
                                @endfor
                    </tr>
                    @php $index++ @endphp
                    @endforeach
                    <tr>
                </tbody>
                <p></p>
            </table>
        </div>

        {{-- <div class="jumbotron">
            <h1 class="display-4">Hello, world!</h1>
            <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention
                to featured content or information.</p>
            <hr class="my-4">
            <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
            <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
        </div> --}}

        <div class="mt-3 jumbotron">
            <table class="h5">
                <h3>INFORMATION!</h3>
                <tr>
                    <td><i class="fas fa-check"></i></td>
                    <td>=</td>
                    <td>Attend</td>
                </tr>
                <tr>
                    <td><b>S</b></td>
                    <td>=</td>
                    <td>Sick</td>
                </tr>
                <tr>
                    <td><i class="fas fa-times"></i> </td>
                    <td>=</td>
                    <td>Absent</td>
                </tr>
            </table>
        </div>
        <a href="{{ route('attendances.index') }}" class="btn btn-outline-success">Back</a>
    </div>
</div>

@endsection