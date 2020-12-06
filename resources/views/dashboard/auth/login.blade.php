@extends('layouts.dashboard.auth.app')

@section('title', trans('dashboard.login'))


@section('content')

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="login-container">
            <div class="row no-gutters">
                <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
                    <div class="login-box">
                        <a href="#" class="login-logo">
                            <img src="{{ asset('dashboard') }}/img/unify.png" alt="Unify Admin Dashboard" />
                        </a>
                        <div class="input-group" style="margin-bottom: 10px;">
                            <span class="input-group-addon" id="email"><i class="icon-account_circle"></i></span>
                            <input value="{{ old('email') }}" type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email ID">
                        </div>
                        @error('email')
                        <p style="color: #ae1c17">{{ $message }}</p>
                        @enderror
                        <br>
                        <div class="input-group" style="margin-bottom: 10px;">
                            <span class="input-group-addon" id="password"><i class="icon-verified_user"></i></span>
                            <input value="{{ old('password') }}" type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                        </div>
                        @error('password')
                        <p style="color: #ae1c17">{{ $message }}</p>
                        @enderror
                        <div class="actions clearfix">
                            <a href="{{ route('password.request') }}">Lost password?</a>
                            <button type="submit" class="btn btn-primary">@lang('dashboard.login')</button>
                        </div>

                    </div>
                </div>
                <div class="col-xl-8 col-lg-7 col-md-6 col-sm-12">
                    <div class="signup-slider"></div>
                </div>
            </div>
        </div>
    </form>

@endsection
