@extends('layouts.auth')

@section('sideblock')
    <div class="kt-grid__item kt-grid__item--middle">
        @if(GlobalSettings::get('login-block-title') !== '')
            <h3 class="kt-login__title">{{ GlobalSettings::get('login-block-title') }}</h3>
        @endif
        @if(GlobalSettings::get('login-block-description') !== '')
            <h4 class="kt-login__subtitle">{{ GlobalSettings::get('login-block-description') }}</h4>
        @endif
    </div>
@endsection

@section('content')
<div class="kt-grid__item kt-grid__item--fluid  kt-grid__item--order-tablet-and-mobile-1  kt-login__wrapper">
    @if(GlobalSettings::get('registration') !== 'closed')
    <div class="kt-login__head">
        <span class="kt-login__signup-label">Don't have an account yet?</span>&nbsp;&nbsp;
        <a href="{{ route('register') }}" class="kt-link kt-login__signup-link">Sign Up!</a>
    </div>
    @endif

    <div class="kt-login__body">

        <div class="kt-login__form">
            <div class="kt-login__title">
                <h3>Login</h3>
            </div>

            <form class="kt-form" action="{{ route('login') }}" method="POST" novalidate="novalidate">
                @csrf

                <div class="form-group">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email Address" required autofocus>

                    @if ($errors->has('email'))
                        <div class="alert alert-solid-danger alert-bold" role="alert">
                            <div class="alert-text">{{ $errors->first('email') }}</div>
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

                <div class="kt-login__actions">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="kt-link kt-login__link-forgot">
                            Forgot Your Password ?
                        </a>
                    @else
                        <a href="#" class="kt-link kt-login__link-forgot"></a>
                    @endif
                    <button id="kt_login_signin_submit"
                            class="btn btn-primary btn-elevate kt-login__btn-primary" type="submit">Login
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
