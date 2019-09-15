@section('title', 'Dashboard')
@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">
        <span class="h5 mb-0"><i class="fas fa-home"></i> Dashboard</span>
    </div>

    <div class="card-body">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif

        You are logged in!
    </div>
</div>
</div>

@endsection