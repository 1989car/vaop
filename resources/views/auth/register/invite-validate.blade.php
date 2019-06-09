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
                        <input id="invite-code" type="text" class="form-control" name="invite_code" placeholder="Invite Code" required>
                    </div>

                    <div class="form-group">
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ session('invite_code_email') }}" placeholder="Email Address" required autofocus>

                        @if ($errors->has('email'))
                            <div class="alert alert-solid-danger alert-bold" role="alert">
                                <div class="alert-text">{{ $errors->first('email') }}</div>
                            </div>
                        @endif
                    </div>

                    <div class="kt-login__actions">
                        @if (GlobalSettings::get('registration-invite-message') !== '')
                            <a href="#" data-toggle="modal" data-target="#help_modal" class="kt-link kt-login__link-forgot">
                                Don't have an invite code ?
                            </a>
                        @else
                            <a href="#" class="kt-link kt-login__link-forgot"></a>
                        @endif
                        <button id="kt_login_signin_submit"
                                class="btn btn-primary btn-elevate kt-login__btn-primary" type="submit">Continue
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="help_modal" tabindex="-1" role="dialog" aria-labelledby="help_modal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Invitation Codes</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <p>{!! GlobalSettings::get('registration-invite-message') !!}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
