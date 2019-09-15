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
        @include('layouts.topbar')

        <main class="py-4 flex-grow-1 h-100">
            <div class="container-fluid">
                <div class="row">
                    @include('layouts.sidebar')
                    @if (Auth::user())
                    <div class="col-lg-10 mt-3">
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