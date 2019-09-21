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
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Icon -->
    {{-- <link rel="shortcut icon" href="{{ asset('img/logo-min.png') }}" type="image/x-icon"> --}}
</head>

<body>
    <!-- APP <Start> -->
    <div id="app" class="app">
        @include('layouts.sidebar')

        <main class="flex-grow-1">
            @include('layouts.topbar')
            <div class="container-fluid">
                <div class="row py-4 px-3">
                    @if (Auth::user())
                    <div class="col-lg-12 mt-3">
                        @endif
                        @yield('content')
                    </div>
                </div>
                <footer class="text-center p-3">
                    <span>&copy; {{ date("Y") }}</span>
                </footer>
            </div>
        </main>
    </div>


    <!-- APP <End> -->

    <script>
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('.sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });

            $('.counter').each(function() {
                var $this = $(this), countTo = $this.attr('data-count');
                $({ countNum: $this.text()}).animate({
                    countNum: countTo
                },
                {
                    duration: 600,
                    easing: 'swing',
                    step: function() {
                    $this.text(Math.floor(this.countNum));
                    },
                    complete: function() {
                    $this.text(this.countNum);
                    }
                });  
            });
        });
    </script>
</body>

</html>