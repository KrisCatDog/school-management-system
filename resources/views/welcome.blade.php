<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 77px;
        }

        .links>a {
            color: #636b6f;
            padding: .7rem 1.2rem;
            border-radius: .5rem;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
            margin: 0 0 0 .5rem;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                School Management System
            </div>

            <div class="links">
                @auth
                <a href="{{ url('/home') }}" class="btn-gd-success">Home</a>
                @else
                <a href="{{ route('login') }}" class="btn-gd-info">Login</a>
                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="btn-gd-warning">Register</a>
                @endif
                @endauth
            </div>
        </div>
    </div>
</body>

</html>