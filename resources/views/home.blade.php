<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
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
    <link href="https://assets.vaop.flightsim.aero/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
    <!--RTL version:<link href="https://assets.vaop.flightsim.aero/vendors/custom/fullcalendar/fullcalendar.bundle.rtl.css" rel="stylesheet" type="text/css" />-->
    <link href="https://assets.vaop.flightsim.aero/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
    <!--RTL version:<link href="https://assets.vaop.flightsim.aero/vendors/base/vendors.bundle.rtl.css" rel="stylesheet" type="text/css" />-->
    <link href="https://assets.vaop.flightsim.aero/demo/demo4/base/style.bundle.css" rel="stylesheet" type="text/css" />
    <!--RTL version:<link href="https://assets.vaop.flightsim.aero/demo/demo4/base/style.bundle.rtl.css" rel="stylesheet" type="text/css" />-->

    @yield('stylesheets')

    <link rel="shortcut icon" href="https://assets.vaop.flightsim.aero/media/logos/favicon.ico" />
</head>

<body style="background-image: url(https://assets.vaop.flightsim.aero/demo/demo4/media/bg/header.jpg); background-position: center top; background-size: 100% 350px;" class="kt-page--loading-enabled kt-page--loading kt-page--fixed kt-header--fixed kt-header--minimize-menu kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-page--loading">

<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
    <div class="kt-header-mobile__logo">
        <a href="{{ route('home') }}">
            <img alt="Logo" src="https://assets.vaop.flightsim.aero/media/logos/logo-4-sm.png" />
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
                        <a class="kt-header__brand-logo" href="{{ route('home') }}">
                            <img alt="Logo" src="https://assets.vaop.flightsim.aero/media/logos/logo-4.png" class="kt-header__brand-logo-default" />
                            <img alt="Logo" src="https://assets.vaop.flightsim.aero/media/logos/logo-4-sm.png" class="kt-header__brand-logo-sticky" />
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

            @include('layouts.partials.footer')

        </div>
    </div>
</div>

@include('layouts.partials.quickpanel')

<div id="kt_scrolltop" class="kt-scrolltop">
    <i class="fa fa-arrow-up"></i>
</div>

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
