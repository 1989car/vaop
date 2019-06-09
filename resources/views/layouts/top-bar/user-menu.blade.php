<div class="kt-header__topbar-item kt-header__topbar-item--user">
    <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
        <span class="kt-header__topbar-welcome">Hi,</span>
        <span class="kt-header__topbar-username" style="white-space: nowrap;">{{ auth()->user()->name }}</span>
        <img alt="Avatar" src="{{ auth()->user()->avatar_url }}" />
    </div>
    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl">

        <div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x" style="background-image: url(https://vaopassets.blob.core.windows.net/images/default/user-menu-background.png)">
            <div class="kt-user-card__avatar">
                <img alt="Avatar" src="{{ auth()->user()->avatar_url }}" />
            </div>
            <div class="kt-user-card__name">
                {{ auth()->user()->name }}
            </div>
            <div class="kt-user-card__badge">
                <span class="btn btn-success btn-sm btn-bold btn-font-md">{{ auth()->user()->newThreadsCount() }} messages</span>
            </div>
        </div>

        <div class="kt-notification">
            <!-- TODO: Add profile page -->
            <a href="#" class="kt-notification__item">
                <div class="kt-notification__item-icon">
                    <i class="flaticon2-calendar-3 kt-font-success"></i>
                </div>
                <div class="kt-notification__item-details">
                    <div class="kt-notification__item-title kt-font-bold">
                        My Profile
                    </div>
                    <div class="kt-notification__item-time">
                        Profile summary and more
                    </div>
                </div>
            </a>
            <a href="{{ route('messages') }}" class="kt-notification__item">
                <div class="kt-notification__item-icon">
                    <i class="flaticon2-mail kt-font-warning"></i>
                </div>
                <div class="kt-notification__item-details">
                    <div class="kt-notification__item-title kt-font-bold">
                        My Messages
                    </div>
                    <div class="kt-notification__item-time">
                        Inbox and messages
                    </div>
                </div>
            </a>
            <!-- TODO: Add account settings -->
            <a href="{{ route('account.settings') }}" class="kt-notification__item">
                <div class="kt-notification__item-icon">
                    <i class="flaticon2-gear"></i>
                </div>
                <div class="kt-notification__item-details">
                    <div class="kt-notification__item-title kt-font-bold">
                        My Settings
                    </div>
                    <div class="kt-notification__item-time">
                        Account settings and options
                    </div>
                </div>
            </a>
            <!--
            <a href="#" class="kt-notification__item">
                <div class="kt-notification__item-icon">
                    <i class="flaticon2-rocket-1 kt-font-danger"></i>
                </div>
                <div class="kt-notification__item-details">
                    <div class="kt-notification__item-title kt-font-bold">
                        My Activities
                    </div>
                    <div class="kt-notification__item-time">
                        Logs and notifications
                    </div>
                </div>
            </a>
            <a href="#" class="kt-notification__item">
                <div class="kt-notification__item-icon">
                    <i class="flaticon2-hourglass kt-font-brand"></i>
                </div>
                <div class="kt-notification__item-details">
                    <div class="kt-notification__item-title kt-font-bold">
                        My Tasks
                    </div>
                    <div class="kt-notification__item-time">
                        latest tasks and projects
                    </div>
                </div>
            </a>
            -->
            <div class="kt-notification__custom">
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-label-brand btn-sm btn-bold">Sign Out</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>