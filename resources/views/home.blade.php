@section('title', 'Dashboard')
@extends('layouts.app')

@section('content')

<h5 class="pb-4"><i class="fas fa-home shadow-sm"></i> Dashboard</h5>
<div class="card">

    <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif

        <p>Amounts of Student Attendances Today</p>
        {{ $attendances->count() }}
    </div>
</div>
</div>

@endsection