@auth
<nav class="navbar navbar-expand-md navbar-light text-center">
    <div class="container">
        {{-- <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}"> --}}
        {{-- <img src="{{ asset('img/logo.png') }}" width="50" height="50" class="d-inline-block
        align-top"> --}}
        {{-- <span class="ml-2 h5">Title</span> --}}
        @auth
        <button type="button" id="sidebarCollapse" class="navbar-btn">
            <span></span>
            <span></span>
            <span></span>
        </button>
        @endauth
        @guest
        <a class="navbar-brand" href="{{ url('/') }}">
            School Management System
        </a>
        @endguest
        {{-- </a> --}}

        {{-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
        <span class="navbar-toggler-icon"></span>
        </button> --}}

        {{-- <div class="collapse navbar-collapse" id="navbarSupportedContent"> --}}
        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav mr-auto">

        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
            @endif
            @else
            <li class="nav-item dropdown">

                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false" v-pre>
                    @if (Auth::user()->role_id == 2)
                    <img src="{{ Auth::user()->load('student')->student->photo }}" class="rounded-circle mr-2"
                        width="35">
                    @endif
                    <b>{{ Auth::user()->name }} <span class="caret"></span></b>
                </a>

                <div class="dropdown-menu dropdown-menu-right position-absolute" aria-labelledby="navbarDropdown">
                    @if (auth()->user()->role_id != 1)
                    <a class="dropdown-item" href="{{ route('users.edit-profile') }}">
                        Edit Profile
                    </a>
                    @endif
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
            @endguest
        </ul>
    </div>
</nav>
@endauth