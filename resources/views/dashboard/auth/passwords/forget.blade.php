@extends('layouts.dashboard.auth.app')

@section('title',trans('dashboard.reset_password'))

@section('content')

    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <div class="login-container">
            <div class="row no-gutters">
                <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
                    <div class="login-box">
                        <a href="#" class="login-logo">
                            <img src="{{ asset('dashboard') }}/img/unify.png" alt="Unify Admin Dashboard" />
                        </a>

                        <h5>Forgot Password?</h5>
                        <p class="info">In order to receive your access code by email, please enter the address you provided during the registration process.</p>

                        <div class="input-group" style="margin-bottom: 10px;">
                            <span class="input-group-addon" id="emial"><i class="icon-account_circle"></i></span>
                            <input name="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email Address">

                        </div>
                        @error('email')
                        <p style="color: #ae1c17">{{ $message }}</p>
                        @enderror
                        <div class="actions clearfix">
                            <a href="{{ route('login') }}">Login?</a>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-7 col-md-6 col-sm-12">
                    <div class="login-slider">
                        <a href="javacsript:void(0)">
                            <img src="{{ asset('dashboard') }}/img/play-button.svg" class="play-icon" alt="play video" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection
