@if (Auth::user())
<style>
    .list-group-item i {
        margin-right: .8rem;
    }
</style>
<div class="col-lg-2 mt-3">
    <div class="list-group" id="list-group">
        <a href="{{ url('home') }}" class="list-group-item list-group-item-action 
                                @if(url()->current() == url('home'))
                                    active
                                @endif">
            <i class="fas fa-home"></i> Dashboard
        </a>
        <a href=" {{ route('attendances.index') }}" class="list-group-item list-group-item-action
                                @if(url()->current() == url('attendances'))
                                    active
                                @endif">
            <i class="fas fa-chart-pie"></i> Attendance
        </a>
        <a href="{{ route('users.index') }}" class="list-group-item list-group-item-action
        @if(url()->current() == url('users'))
        active
        @endif">
            <i class="fas fa-users"></i> Users
        </a>


        <a href="{{ route('students.index') }}" class="list-group-item list-group-item-action
            @if(url()->current() == url('students'))
            active
            @endif">
            <i class="fas fa-user-tie"></i>
            Students</a>
        <a href="{{ route('teachers.index') }}" class="list-group-item list-group-item-action
            @if(url()->current() == url('teachers'))
            active
            @endif">
            <i class="fas fa-user-friends"></i>
            Teacher</a>

        <a href="#" class="list-group-item list-group-item-action" id="headingOne" data-toggle="collapse"
            data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
            <i class="fas fa-newspaper"></i>
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
        </div>
    </div>
</div>
@endif