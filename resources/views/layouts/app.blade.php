<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.partials.head')

@if(GlobalSettings::get('header-background-image') !== '')
    <body style="background-image: url({{ Storage::url(GlobalSettings::get('header-background-image')) }}); background-position: center top; background-size: 100% 350px;" class="kt-page--loading-enabled kt-page--loading kt-page--fixed kt-header--fixed kt-header--minimize-menu kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-page--loading">
@else
    <body style="background-image: url('https://vaopassets.blob.core.windows.net/images/default/header-background.png'); background-position: center top; background-size: 100% 350px;" class="kt-page--loading-enabled kt-page--loading kt-page--fixed kt-header--fixed kt-header--minimize-menu kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-page--loading">
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

    @include('layouts.partials.foot')

</body>
</html>