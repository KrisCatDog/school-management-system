@if (Auth::user())
<style>
    .list-group-item i {
        margin-right: .8rem;
    }
</style>
<div class="col-lg-2 mt-3">
    <div class="list-group" id="list-group">
        <a href="{{ url('home') }}" class="list-group-item list-group-item-action 
                                @if(url()->current() == url('admin/home'))
                                    bg-green-normal
                                @endif">
            <i class="fas fa-home"></i> Dashboard
        </a>
        <a href=" {{ "" }}" class="list-group-item list-group-item-action
                                @if(url()->current() == url('admin/divisions'))
                                    bg-green-normal
                                @endif">
            <i class="fas fa-chart-pie"></i> Attendance
        </a>
        {{-- <a href="{{ route('user.index') }}" class="list-group-item list-group-item-action
        @if(url()->current() == url('admin/users'))
        bg-green-normal
        @endif">
        <i class="fas fa-users"></i> Users
        </a> --}}


        <a href="{{ route('student.index') }}" class="list-group-item list-group-item-action">
            <i class="fas fa-gem"></i>
            Students</a>
        <a href="{{ route('teacher.index') }}" class="list-group-item list-group-item-action
            @if(url()->current() == url('admin/settings'))
            bg-green-normal
            @endif">
            <i class="fas fa-sliders-h"></i>
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
                    bg-green-normal
                    @endif">
                <i class="fas fa-newspaper"></i>
                Students</a>
            <a href="{{ "" }}" class="list-group-item list-group-item-action
                        @if(url()->current() == url('admin/categories'))
                    bg-green-normal
                    @endif">
                <i class="fas fa-newspaper"></i>
                Teacher</a>
            <a href="{{ "" }}" class="list-group-item list-group-item-action
                        @if(url()->current() == url('admin/tags'))
                    bg-green-normal
                    @endif">
                <i class="fas fa-newspaper"></i>
                Tags</a>
        </div>
    </div>
</div>
@endif