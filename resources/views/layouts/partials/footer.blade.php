<div class="kt-footer  kt-footer--extended  kt-grid__item" id="kt_footer" style="background-image: url('https://assets.vaop.flightsim.aero/media/bg/bg-2.jpg');">
    <div class="kt-footer__bottom">
        <div class="kt-container">
            <div class="kt-footer__wrapper">
                <div class="kt-footer__logo">
                    <a class="kt-header__brand-logo" href="{{ route('dashboard') }}">
                        <img alt="Logo" src="{{ env('UPLOADS_BASE_URL').GlobalSettings::get('logo-small-dark') }}" class="kt-header__brand-logo-sticky" height="30px">
                    </a>
                    <div class="kt-footer__copyright">
                        {!! GlobalSettings::get('copyright-block') !!}
                    </div>
                </div>
                <div class="kt-footer__menu">
                    <a href="#" target="_blank">Disclaimer</a>
                    <a href="#" target="_blank">Privacy Policy</a>
                    <a href="#" target="_blank">Terms of Service</a>
                </div>
            </div>
        </div>
    </div>
</div>