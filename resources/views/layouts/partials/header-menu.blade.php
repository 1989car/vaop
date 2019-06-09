<button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
<div class="kt-header-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_header_menu_wrapper">
    <div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile ">
        <ul class="kt-menu__nav ">
            <li class="kt-menu__item {{ (request()->is('/')) ? 'kt-menu__item--here' : '' }}" aria-haspopup="true"><a href="{{ route('dashboard') }}" class="kt-menu__link"><span class="kt-menu__link-text">Dashboard</span></a></li>
            <li class="kt-menu__item {{ (request()->is('operations*')) ? 'kt-menu__item--here' : '' }}" aria-haspopup="true"><a href="{{ route('dashboard.operations') }}" class="kt-menu__link"><span class="kt-menu__link-text">Operations</span></a></li>
            <li class="kt-menu__item {{ (request()->is('community*')) ? 'kt-menu__item--here' : '' }}" aria-haspopup="true"><a href="{{ route('dashboard') }}" class="kt-menu__link"><span class="kt-menu__link-text">Community</span></a></li>
            <li class="kt-menu__item {{ (request()->is('resources*')) ? 'kt-menu__item--here' : '' }}" aria-haspopup="true"><a href="{{ route('dashboard') }}" class="kt-menu__link"><span class="kt-menu__link-text">Resources</span></a></li>
            <li class="kt-menu__item {{ (request()->is('support*')) ? 'kt-menu__item--here' : '' }}" aria-haspopup="true"><a href="{{ route('dashboard') }}" class="kt-menu__link"><span class="kt-menu__link-text">Support</span></a></li>
        </ul>
    </div>
</div>