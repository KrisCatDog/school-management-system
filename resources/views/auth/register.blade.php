@section('title', 'Register')
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-xl-6">
            <h1 class="text-center font-cursive pt-5 mt-5"> <span class="font-weight-bold">Register</span> Page</h1>
            <div class="card-body">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group mt-5">
                        <label for="name" class="font-weight-bold">Name</label>
                        <input type="text" class="form-control form-control-2 @error('name') is-invalid @enderror"
                            id="name" name="name" value="{{ old('name') }}" autocomplete="name" placeholder="Your name"
                            autofocus>

                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email" class="font-weight-bold">Email Address</label>
                        <input type="text" class="form-control form-control-2 @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" autocomplete="current-email" id="email"
                            placeholder="Your email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password" class="font-weight-bold">{{ __('Password') }}</label>
                        <input id="password" type="password"
                            class="form-control form-control-2 @error('password') is-invalid @enderror" name="password"
                            autocomplete="new-password" placeholder="Your password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password-confirm" class="font-weight-bold">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password" class="form-control form-control-2"
                            name="password_confirmation" autocomplete="new-password"
                            placeholder="Confirm your password">
                    </div>

                    <div class="d-flex justify-content-between align-items-center flex-row-reverse mt-4">
                        <button type="submit" class="btn btn-gd-success btn-lg btn-login">
                            Register
                        </button>
                        <span>
                            Already have an account ?
                            <a class="btn btn-link text-success" href="{{ route('login') }}">
                                Login Now!
                            </a>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>






@endsection