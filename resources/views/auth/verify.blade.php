@extends('layouts.auth')

@section('title','Verify Email Address')

@section('content')
    <div class="kt-grid__item kt-grid__item--fluid  kt-grid__item--order-tablet-and-mobile-1  kt-login__wrapper">
        <div class="kt-login__body">

            <div class="kt-login__form">

                <div class="kt-login__title">
                    <h3>Verify Your Email Address</h3>
                </div>

                @if (session('resent'))
                    <div class="alert alert-solid-success alert-bold" role="alert">
                        <div class="alert-text">A fresh verification link has been sent to your email address.</div>
                    </div>
                @endif

                <p>Before proceeding, please check your email for a verification link.</p>
                <p>If you did not receive the email, <a href="{{ route('verification.resend') }}">click here to request another.</p>
            </div>
        </div>
    </div>
@endsection
