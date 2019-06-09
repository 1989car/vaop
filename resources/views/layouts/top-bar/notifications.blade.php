<div class="kt-header__topbar-item dropdown">
    <div class="kt-header__topbar-wrapper" id="notification-icon" data-toggle="dropdown" data-offset="10px,0px">
        <span class="kt-header__topbar-icon kt-pulse kt-pulse--light">
            <i class="flaticon2-bell-alarm-symbol"></i>
            @if(count(auth()->user()->unreadNotifications) > 0)
                <span class="kt-pulse__ring"></span>
            @endif
        </span>

        @if(count(auth()->user()->unreadNotifications) > 0)
            <span class="kt-badge kt-badge--light"></span>
        @endif
    </div>
    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl">
        <form>

            <div class="kt-head kt-head--skin-dark kt-head--fit-x" style="background-image: url(https://vaopassets.blob.core.windows.net/images/default/user-menu-background.png)">
                <h3 class="kt-head__title">
                    User Notifications
                    &nbsp;
                    @if(count(auth()->user()->unreadNotifications) > 0)
                        <span class="btn btn-success btn-sm btn-bold btn-font-md">{{ count(auth()->user()->unreadNotifications) }} new</span>
                    @endif
                </h3>
            </div>
            <div class="tab-pane active show" id="topbar_notifications_notifications" role="tabpanel">
                @if(count(auth()->user()->unreadNotifications) > 0)
                <div class="kt-notification kt-margin-t-0 kt-margin-b-10 kt-scroll" data-scroll="true" data-height="300" data-mobile-height="200">
                    @foreach($user->unreadNotifications as $notification)
                        <a href="#" class="kt-notification__item">
                            <div class="kt-notification__item-icon">
                                <!-- TODO: Add all notification type icons -->
                                <i class="flaticon2-line-chart kt-font-success"></i>
                            </div>
                            <div class="kt-notification__item-details">
                                <div class="kt-notification__item-title">
                                    {{ $notification->data }}
                                </div>
                                <div class="kt-notification__item-time">
                                    {{ $notification->created_at->diffForHumans() }}
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
                @else
                <div class="kt-grid kt-grid--ver" style="min-height: 200px;">
                    <div class="kt-grid kt-grid--hor kt-grid__item kt-grid__item--fluid kt-grid__item--middle">
                        <div class="kt-grid__item kt-grid__item--middle kt-align-center">
                            All caught up!
                            <br>No new notifications.
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </form>
    </div>
</div>

@section('javascript')
    @parent

    <script type="application/javascript">
        $("#notification-icon").click(function(e) {
            $.ajax({
                type: "POST",
                url: "{{ route('notifications.markallread') }}",

            });
        });
    </script>
@endsection