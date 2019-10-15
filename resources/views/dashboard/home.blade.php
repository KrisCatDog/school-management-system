@section('title', 'Dashboard')
@extends('layouts.app')

@section('content')

<h5 class="pb-4"><i class="fas fa-home shadow-sm"></i> <b>Dashboard</b></h5>

<section class="home-container">
    <div class="home-header-item flex-grow-2 d-flex align-items-center">
        <span class="h1 mr-3"><i class="fas fa-user-tie"></i></span>
        <div>
            Students Today
            <div class="h2 counter" data-count="{{ $attendStudents->count() }}">0</div>
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
    <a href="{{ route('home.notattend') }}" class="card-link">
        <div class="home-header-item d-flex align-items-center">
            <span class="h1 mr-3"><i class="fas fa-user-tie"></i></span>
            <div>
                Students Not Attend Today
                <div class="h2 counter" data-count="{{ $sickStudents->count() + $absentStudents->count() }}">0</div>
            </div>
        </div>
    </a>

    <a href="{{ route('home.mostabsent') }}" class="card-link flex-grow-2">
        <div class="home-header-item d-flex  align-items-center">
            <span class="h1 mr-3"><i class="fas fa-user-tie"></i></span>
            <div>
                Students with the Most <span class="text-danger">Absent</span>
                <div class="h2 counter" data-count="{{ $mostAbsentStudents }}">0</div>
            </div>
        </div>
    </a>
</section>

<section class="home-container">
    <div class="home-header-item flex-grow-2 d-flex align-items-center">
        <span class="h1 mr-3"><i class="fas fa-book-reader"></i></span>
        <div>
            Total Subjects
            <div class="h2 counter" data-count="{{ $totalSubjects }}">0</div>
        </div>
    </div>
</section>

<section class="home-container">
    <a href="{{ route('home.highestscores') }}" class="card-link">
        <div class="home-header-item d-flex align-items-center">
            <span class="h1 mr-3"><i class="fas fa-user-tie"></i></span>
            <div>
                Students with <span class="text-success">Highest Scores</span>
                <div class="h2 counter" data-count="{{ $highestScoresStudents }}">0</div>
            </div>
        </div>
    </a>

    <a href="{{ route('home.lowestscores') }}" class="card-link flex-grow-2">
        <div class="home-header-item d-flex align-items-center">
            <span class="h1 mr-3"><i class="fas fa-door-open"></i></span>
            <div>
                Students with <span class="text-danger">Lowest Scores</span>
                <div class="h2 counter" data-count="{{ $lowestScoresStudents }}">0</div>
            </div>
        </div>
    </a>
</section>

<section class="home-container">
    <div class="home-header-item flex-grow-2 d-flex align-items-center">
        <span class="h1 mr-3"><i class="fas fa-user-tie"></i></span>
        <div>
            Total Students
            <div class="h2 counter" data-count="{{ $totalStudents }}">0</div>
        </div>
    </div>

    <div class="home-header-item d-flex align-items-center">
        <span class="h1 mr-3"><i class="fas fa-user-friends"></i></span>
        <div>
            Total Teachers
            <div class="h2 counter" data-count="{{ $totalTeachers }}">0</div>
        </div>
    </div>
</section>

@endsection