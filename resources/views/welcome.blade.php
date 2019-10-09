<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah&display=swap" rel="stylesheet">
    <title>School Management System</title>

    <!-- Styles -->
    <style>
        html,
        body {
            background-image: linear-gradient(120deg, #d4fc79 0%, #96e6a1 100%);
            color: #555;
            font-family: 'Quicksand', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
            display: flex;
            flex-direction: column;
            animation: bgAnim 2s infinite;
            background-size: 150% 150%;
        }

        @keyframes bgAnim {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        .full-height {
            flex-grow: 1;
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
            font-family: 'Gloria Hallelujah', cursive;
        }

        .subtitle {
            font-size: 45px;
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

        @media (max-width: 576px) {
            .title {
                font-size: 57px;
            }

            .subtitle {
                font-size: 30px;
            }
        }
    </style>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title">
                School Management System
            </div>
            <div class="subtitle m-b-md">
                Beta Version
            </div>

            <div class="links">
                @auth
                <a href="{{ url('/home') }}" class="btn-gd-teal">Home</a>
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