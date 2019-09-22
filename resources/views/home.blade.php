@section('title', 'Dashboard')
@extends('layouts.app')

@section('content')

<h5 class="pb-4"><i class="fas fa-home shadow-sm"></i> <b>Dashboard</b></h5>

<section class="home-container">
    <div class="home-header-item flex-grow-2 d-flex align-items-center">
        <span class="h1 mr-3"><i class="fas fa-user-tie"></i></span>
        <div>
            Students Today
            <div class="h2 counter" data-count="{{ $attendances->unique('student_id')->count() }}">0</div>
        </div>
    </div>

    <div class="home-header-item d-flex align-items-center">
        <span class="h1 mr-3"><i class="fas fa-door-open"></i></span>
        <div>
            Classes Today
            <div class="h2 counter" data-count="{{ $attendances->unique('class_id')->count() }}">0</div>
        </div>
    </div>
</section>

<section class="home-container">
    <div class="home-header-item flex-grow-2 d-flex align-items-center">
        <span class="h1 mr-3"><i class="fas fa-user-friends"></i></span>
        <div>
            Total Subjects
            <div class="h2 counter" data-count="{{ $totalSubjects }}">0</div>
        </div>
    </div>
</section>

<section class="home-container">
    <div class="home-header-item d-flex align-items-center">
        <span class="h1 mr-3"><i class="fas fa-user-tie"></i></span>
        <div>
            Total Students
            <div class="h2 counter" data-count="{{ $totalStudents }}">0</div>
        </div>
    </div>

    <div class="home-header-item flex-grow-2 d-flex align-items-center">
        <span class="h1 mr-3"><i class="fas fa-user-friends"></i></span>
        <div>
            Total Teachers
            <div class="h2 counter" data-count="{{ $totalTeachers }}">0</div>
        </div>
    </div>
</section>

@endsection