@extends('layouts.auth')

@section('title','Registration')

@section('sideblock')
    <div class="kt-grid__item kt-grid__item--middle">
        @if(GlobalSettings::get('register-block-title') !== '')
            <h3 class="kt-login__title">{{ GlobalSettings::get('register-block-title') }}</h3>
        @endif
        @if(GlobalSettings::get('register-block-description') !== '')
            <h4 class="kt-login__subtitle">{{ GlobalSettings::get('register-block-description') }}</h4>
        @endif
    </div>
@endsection

@section('content')
    <div class="kt-grid__item kt-grid__item--fluid  kt-grid__item--order-tablet-and-mobile-1  kt-login__wrapper">
        <div class="kt-login__head">
            <span class="kt-login__signup-label">Already have an account?</span>&nbsp;&nbsp;
            <a href="{{ route('login') }}" class="kt-link kt-login__signup-link">Login!</a>
        </div>

        <div class="kt-login__body">

            <div class="kt-login__form">
                <div class="kt-login__title">
                    <h3>Register</h3>
                </div>

                <form class="kt-form" action="{{ route('register') }}" method="POST" novalidate="novalidate">
                    @csrf

                    @if($errors->any())
                        <div class="alert alert-solid-danger alert-bold" role="alert">
                            <div class="alert-text">{{ $errors->first() }}</div>
                        </div>
                    @endif

                    <div class="form-group">
                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" placeholder="Your Name" required autofocus>

                        @if ($errors->has('name'))
                            <div class="alert alert-solid-danger alert-bold" role="alert">
                                <div class="alert-text">{{ $errors->first('name') }}</div>
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>

                        @if ($errors->has('password'))
                            <div class="alert alert-solid-danger alert-bold" role="alert">
                                <div class="alert-text">{{ $errors->first('password') }}</div>
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Password Confirmation" required>
                    </div>

                    <input type="hidden" name="email" value="{{ session('invite_code_email') }}" />
                    <input type="hidden" name="invite_code" value="{{ session('invite_code') }}" />

                    <div class="kt-login__actions">
                        <a href="#" class="kt-link kt-login__link-forgot"></a>
                        <button id="kt_login_signin_submit"
                                class="btn btn-primary btn-elevate kt-login__btn-primary" type="submit">Register
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
