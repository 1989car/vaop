@extends('layouts.auth')

@section('title','Reset Password')

@section('content')
    <div class="kt-grid__item kt-grid__item--fluid  kt-grid__item--order-tablet-and-mobile-1  kt-login__wrapper">
        <div class="kt-login__body">

            <div class="kt-login__form">
                <div class="kt-login__title">
                    <h3>Reset Password</h3>
                </div>

                @if (session('status'))
                    <div class="alert alert-solid-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <form class="kt-form" action="{{ route('password.email') }}" method="POST" novalidate="novalidate">
                    @csrf

                    <div class="form-group">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email Address" required autofocus>

                        @if ($errors->has('email'))
                            <div class="alert alert-solid-danger alert-bold" role="alert">
                                <div class="alert-text">{{ $errors->first('email') }}</div>
                            </div>
                        @endif
                    </div>

                    <div class="kt-login__actions">
                        <a href="#" class="kt-link kt-login__link-forgot"></a>
                        <button id="kt_login_signin_submit"
                                class="btn btn-primary btn-elevate kt-login__btn-primary" type="submit">Send Password Reset Link
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
