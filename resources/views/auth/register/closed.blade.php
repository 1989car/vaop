@extends('layouts.auth')

@section('title','Registration Closed')

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
                    <h3>Registration Closed</h3>
                </div>

                <p>{{ GlobalSettings::get('registration-closed-message') }}</p>
            </div>
        </div>
    </div>
@endsection
