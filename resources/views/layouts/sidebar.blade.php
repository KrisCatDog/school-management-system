@if (Auth::user())
<div class="col-lg-3 mt-3">
    <div class="list-group" id="list-group">
        <a href="{{ url('home') }}" class="list-group-item list-group-item-action 
                                @if(url()->current() == url('admin/home'))
                                    bg-green-normal
                                @endif">
            <i class="fas fa-home"></i> Dashboard
        </a>
        <a href="{{ route('user.index') }}" class="list-group-item list-group-item-action
                                @if(url()->current() == url('admin/users'))
                                    bg-green-normal
                                @endif">
            <i class="fas fa-users"></i> Users
        </a>
        <a href=" {{ "" }}" class="list-group-item list-group-item-action
                                @if(url()->current() == url('admin/divisions'))
                                    bg-green-normal
                                @endif">
            <i class="fas fa-chart-pie"></i> Divisions
        </a>

        <a href="#" class="list-group-item list-group-item-action" id="headingOne" data-toggle="collapse"
            data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
            {{-- <i class="fas fa-newspaper"></i> --}}
            Articles & Categories & Tags</a>

        <div id="collapseOne" class="collapse  text-center
                @if(url()->current() == url('admin/articles') || url()->current() == url('admin/categories') || url()->current() == url('admin/tags'))
                show
                @endif" aria-labelledby="headingOne" data-parent="#list-group">
            <a href="{{ "" }}" class="list-group-item list-group-item-action
                    @if(url()->current() == url('admin/articles'))
                bg-green-normal
                @endif">
                <i class="fas fa-newspaper"></i>
                Articles</a>
            <a href="{{ "" }}" class="list-group-item list-group-item-action
                    @if(url()->current() == url('admin/categories'))
                bg-green-normal
                @endif">
                <i class="fas fa-newspaper"></i>
                Categories</a>
            <a href="{{ "" }}" class="list-group-item list-group-item-action
                    @if(url()->current() == url('admin/tags'))
                bg-green-normal
                @endif">
                <i class="fas fa-newspaper"></i>
                Tags</a>
        </div>

        <a href="#" class="list-group-item list-group-item-action">
            <i class="fas fa-gem"></i>
            Creations</a>
        <a href="{{ "" }}" class="list-group-item list-group-item-action
        @if(url()->current() == url('admin/settings'))
        bg-green-normal
        @endif">
            <i class="fas fa-sliders-h"></i>
            Settings</a>
    </div>
</div>
@endif