<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://kit.fontawesome.com/818523a0db.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('css/style.css') }}" rel="stylesheet"> --}}

    <!-- Icon -->
    {{-- <link rel="shortcut icon" href="{{ asset('img/logo-min.png') }}" type="image/x-icon"> --}}
</head>

<body>
    <!-- APP <Start> -->
    <div id="app" class="d-flex flex-column h-100" style="min-height: 100vh">
        <nav class="navbar navbar-expand-md navbar-light bg-green shadow-sm text-center">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                    {{-- <img src="{{ asset('img/logo-min.png') }}" width="50" height="50" class="d-inline-block
                    align-top"> --}}
                    <span class="ml-2 h5">Title</span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
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
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4 flex-grow-1 h-100">
            <div class="container">
                <div class="row">
                    @include('layouts.sidebar')
                    @if (Auth::user())
                    <div class="col-lg-9 mt-3">
                        @endif
                        @guest
                        <div class="col-lg-12 mt-3">
                            @endguest

                            @yield('content')
                        </div>
                    </div>
                </div>
        </main>

        <footer class="text-center p-3 ">
            <div class="container d-flex justify-content-between">
                <span>Made with <i class="fas fa-heart"></i> & <i class="fas fa-fist-raised"></i></span>
                <span>&copy; {{ date("Y") }} D'Techno 13. All rights reserved.</span>
            </div>
        </footer>
    </div>
    <!-- APP <End> -->
</body>

</html>