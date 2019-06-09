<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@section('stylesheets')
<link href="/css/pages/login.css" rel="stylesheet" type="text/css" />
@endsection
@include('layouts.partials.head')

<body class="kt-page--loading-enabled kt-page--loading kt-page--fixed kt-header--fixed kt-header--minimize-menu kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-page--loading kt-demo-panel--right kt-offcanvas-panel--right">
<div class="kt-grid kt-grid--ver kt-grid--root kt-page">
    <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v1" id="kt_login">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--desktop kt-grid--ver-desktop kt-grid--hor-tablet-and-mobile">
            @if(GlobalSettings::get('external-background-image') !== '')
                <div class="kt-grid__item kt-grid__item--order-tablet-and-mobile-2 kt-grid kt-grid--hor kt-login__aside" style="background-image: url({{ Storage::url(GlobalSettings::get('external-background-image')) }}); background-position: center top;">
            @else
                <div class="kt-grid__item kt-grid__item--order-tablet-and-mobile-2 kt-grid kt-grid--hor kt-login__aside" style="background-image: url(https://vaopassets.blob.core.windows.net/images/default/external-background.png); background-position: center top;">
            @endif
                <div class="kt-grid__item">
                    <a href="{{ route('dashboard') }}" class="kt-login__logo">
                        <img alt="Logo" src="{{ env('UPLOADS_BASE_URL').GlobalSettings::get('logo-small-dark') }}" style="max-width: 100%;">
                    </a>
                </div>
                <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver">
                    @yield('sideblock')
                </div>
                <div class="kt-grid__item">
                    <div class="kt-login__info" style="font-size:11px;">
                        <div class="kt-login__copyright">
                            {!! GlobalSettings::get('copyright-block') !!}
                        </div>
                        <div class="kt-login__menu">
                            @include('layouts.partials.legal-footer-menu')
                        </div>
                    </div>
                </div>
            </div>

            @yield('content')
        </div>
    </div>
</div>

@include('layouts.partials.foot')
</body>