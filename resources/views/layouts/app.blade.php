<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <title>@yield('title') - {{ GlobalSettings::get('site-title') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Poppins:300,400,500,600,700"]
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    @if(GlobalSettings::get('rtl'))
        <link href="https://assets.vaop.flightsim.aero/vendors/custom/fullcalendar/fullcalendar.bundle.rtl.css" rel="stylesheet" type="text/css" />
        <link href="https://assets.vaop.flightsim.aero/vendors/base/vendors.bundle.rtl.css" rel="stylesheet" type="text/css" />
        <link href="https://assets.vaop.flightsim.aero/demo/demo4/base/style.bundle.rtl.css" rel="stylesheet" type="text/css" />
    @else
        <link href="https://assets.vaop.flightsim.aero/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
        <link href="https://assets.vaop.flightsim.aero/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
        <link href="https://assets.vaop.flightsim.aero/demo/demo4/base/style.bundle.css" rel="stylesheet" type="text/css" />
    @endif

    @yield('stylesheets')

    <link rel="shortcut icon" href="{{ Storage::url(GlobalSettings::get('favicon')) }}" />
</head>

@if(GlobalSettings::has('header-background-image') && GlobalSettings::get('header-background-image') !== '')
    <body style="background-image: url({{ Storage::url(GlobalSettings::get('header-background-image')) }}); background-position: center top; background-size: 100% 350px;" class="kt-page--loading-enabled kt-page--loading kt-page--fixed kt-header--fixed kt-header--minimize-menu kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-page--loading">
@else
    <body style="background-image: url('/images/default-header-background.png'); background-position: center top; background-size: 100% 350px;" class="kt-page--loading-enabled kt-page--loading kt-page--fixed kt-header--fixed kt-header--minimize-menu kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-page--loading">
@endif

    <div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
        <div class="kt-header-mobile__logo">
            <a href="{{ route('dashboard') }}">
                <img alt="Logo" src="{{ Storage::url(GlobalSettings::get('logo-small-light')) }}" height="60px" />
            </a>
        </div>
        <div class="kt-header-mobile__toolbar">
            <button class="kt-header-mobile__toolbar-toggler" id="kt_header_mobile_toggler"><span></span></button>
            <button class="kt-header-mobile__toolbar-topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more-1"></i></button>
        </div>
    </div>

    <div class="kt-grid kt-grid--hor kt-grid--root">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper " id="kt_wrapper">

                <div id="kt_header" class="kt-header  kt-header--fixed " data-ktheader-minimize="on">
                    <div class="kt-container">

                        <div class="kt-header__brand   kt-grid__item" id="kt_header_brand">
                            <a class="kt-header__brand-logo" href="{{ route('dashboard') }}">
                                <img alt="Logo" src="{{ Storage::url(GlobalSettings::get('logo-full-dark')) }}" class="kt-header__brand-logo-default" height="60px" />
                                <img alt="Logo" src="{{ Storage::url(GlobalSettings::get('logo-small-dark')) }}" class="kt-header__brand-logo-sticky" height="60px" />
                            </a>
                        </div>

                        @include('layouts.partials.header-menu')

                        @include('layouts.partials.header-topbar')
                    </div>
                </div>

                <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-grid--stretch">
                    <div class="kt-container kt-body  kt-grid kt-grid--ver" id="kt_body">
                        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">

                            @include('layouts.partials.subheader')

                            <div class="kt-content kt-grid__item kt-grid__item--fluid">
                                @yield('content')
                            </div>

                        </div>
                    </div>
                </div>

                @if(GlobalSettings::get('show-footer'))
                    @include('layouts.partials.footer')
                @endif

            </div>
        </div>
    </div>

    @if(GlobalSettings::get('show-scrolltop'))
        <div id="kt_scrolltop" class="kt-scrolltop">
            <i class="fa fa-arrow-up"></i>
        </div>
    @endif

    <script>
        var KTAppOptions = {
            "colors": {
                "state": {
                    "brand": "#366cf3",
                    "light": "#ffffff",
                    "dark": "#282a3c",
                    "primary": "#5867dd",
                    "success": "#34bfa3",
                    "info": "#36a3f7",
                    "warning": "#ffb822",
                    "danger": "#fd3995"
                },
                "base": {
                    "label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
                    "shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
                }
            }
        };
    </script>

    <script src="https://assets.vaop.flightsim.aero/vendors/base/vendors.bundle.js" type="text/javascript"></script>
    <script src="https://assets.vaop.flightsim.aero/demo/demo4/base/scripts.bundle.js" type="text/javascript"></script>

    @yield('javascript')

    <script src="https://assets.vaop.flightsim.aero/app/bundle/app.bundle.js" type="text/javascript"></script>

</body>
</html>