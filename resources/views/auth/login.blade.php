@section('title', 'Login')
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-xl-6">
            <h1 class="text-center font-cursive pt-5 mt-5"> <span class="font-weight-bold">Login</span> Page</h1>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group mt-5">
                    <label for="email" class="font-weight-bold">Email Address</label>
                    <input type="text" class="form-control form-control-2 @error('email') is-invalid @enderror"
                        id="email" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="Your email"
                        autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group mb-4">
                    <label for="password" class="font-weight-bold">Password</label>
                    <input type="password" class="form-control form-control-2  @error('password') is-invalid @enderror"
                        name="password" autocomplete="current-password" id="password" placeholder="Your password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <div class="form-check">
                        <input type="checkbox" name="remember" class="form-check-input" id="remember"
                            {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">Remember Me</label>
                    </div>

                    @if (Route::has('password.request'))
                    <a class="btn btn-link text-success" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                    @endif
                </div>

                <div class="d-flex justify-content-between align-items-center flex-row-reverse mt-4">
                    <button type="submit" class="btn btn-gd-success btn-lg btn-login">
                        Login
                    </button>
                    <span>
                        Don't have an account ?
                        <a class="btn btn-link text-success" href="{{ route('register') }}">
                            Register Now!
                        </a>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection