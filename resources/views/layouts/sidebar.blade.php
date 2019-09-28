@if (Auth::user())
<aside class="sidebar">
    <div class="sidebar-header text-center">
        <a class="navbar-brand" href="{{ url('/') }}">
            <h3 class="mb-0"><b>SMS Beta</b></h3>
        </a>
    </div>
    <div class="container">
        <hr class="m-0 mb-4">
    </div>
    <div class="list-group" id="list-group">
        <a href="{{ url('home') }}" class="list-group-item list-group-item-action 
                                @if(url()->current() == url('home'))
                                    active
                                @endif">
            <i class="fas fa-home text-success"></i> Dashboard
        </a>

        @if (Auth::user()->role_id == 3 || Auth::user()->role_id == 1)

        <a href=" {{ route('attendances.index') }}" class="list-group-item list-group-item-action
        @if(Request::is('attendances*'))
            active
        @endif">
            <i class="fas fa-chart-pie text-success"></i> Attendances
        </a>

        @endif

        @if (Auth::user()->role_id == 1)

        <a href="{{ route('users.index') }}" class="list-group-item list-group-item-action
        @if(url()->current() == url('users'))
        active
        @endif">
            <i class="fas fa-users text-success"></i> Users
        </a>

        <a href="{{ route('roles.index') }}" class="list-group-item list-group-item-action
            @if(url()->current() == url('roles'))
            active
            @endif">
            <i class="fas fa-layer-group text-success"></i>
            Roles</a>
        @endif

        <a href="{{ route('teachers.index') }}" class="list-group-item list-group-item-action
        @if(Request::is('teachers*'))
        active
        @endif">
            <i class="fas fa-user-friends text-success"></i>
            Teachers</a>

        <a href="{{ route('students.index') }}" class="list-group-item list-group-item-action
            @if(Request::is('students*'))
            active
            @endif">
            <i class="fas fa-user-tie text-success"></i>
            Students</a>

        <a href="{{ route('classes.index') }}" class="list-group-item list-group-item-action
            @if(url()->current() == url('classes'))
            active
            @endif">
            <i class="fas fa-door-open text-success"></i>
            Classes</a>

        <a href="{{ route('subjects.index') }}" class="list-group-item list-group-item-action
            @if(url()->current() == url('subjects'))
            active
            @endif">
            <i class="fas fa-book-reader text-success"></i>
            Subjects</a>

        <a href="{{ route('feedbacks.index') }}" class="list-group-item list-group-item-action
            @if(url()->current() == url('feedbacks'))
            active
            @endif">
            <i class="fas fa-newspaper text-success"></i>
            Kritik & Saran</a>
        {{-- <a href="#" class="list-group-item list-group-item-action" id="headingOne" data-toggle="collapse"
            data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
            <i class="fas fa-newspaper text-success"></i>
            Another <i class="fas fa-chevron-down ml-2"></i></a>

        <div id="collapseOne" class="collapse  text-center
                @if(url()->current() == url('admin/articles') || url()->current() == url('admin/categories') || url()->current() == url('admin/tags'))
                show
                @endif" aria-labelledby="headingOne" data-parent="#list-group">
            <a href="{{ "" }}" class="list-group-item list-group-item-action
        @if(url()->current() == url('admin/articles'))
        active
        @endif">
        <i class="fas fa-newspaper"></i>
        Menu</a>
        <a href="{{ "" }}" class="list-group-item list-group-item-action
                    @if(url()->current() == url('admin/categories'))
                active
                @endif">
            <i class="fas fa-newspaper"></i>
            Menu</a>
        <a href="{{ "" }}" class="list-group-item list-group-item-action
                    @if(url()->current() == url('admin/tags'))
                active
                @endif">
            <i class="fas fa-newspaper"></i>
            Menu</a>
    </div> --}}

    </div>
</aside>
@endif