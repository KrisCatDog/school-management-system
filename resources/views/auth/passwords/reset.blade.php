@section('title', 'Reset Your Password')
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5 col-xl-6">
            <h1 class="text-center font-cursive pt-5 mt-5"> <span class="font-weight-bold">Reset</span> Password</h1>
            <div class="card-body">
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group mt-4">
                        <label for="email">Email Address</label>

                        <div class="form-group">
                            <input id="email" type="text"
                                class="form-control form-control-2 @error('email') is-invalid @enderror" name="email"
                                value="{{ $email ?? old('email') }}" required autocomplete="email"
                                placeholder="Your email" autofocus>

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>

                            <input id="password" type="password"
                                class="form-control form-control-2 @error('password') is-invalid @enderror"
                                name="password" required autocomplete="new-password" placeholder="Your new password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password-confirm">Confirm Password</label>
                            <input id="password-confirm" type="password" class="form-control form-control-2 "
                                name="password_confirmation" required autocomplete="new-password"
                                placeholder="Confirm your new password">
                        </div>
                    </div>

                    <div class="d-flex justify-content-center mt-4">
                        <div class="form-group">
                            <button type="submit" class="btn btn-gd-success">
                                {{ __('Reset Password') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection