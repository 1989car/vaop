<div class="kt-grid__item kt-app__toggle kt-app__aside kt-app__aside--lg kt-app__aside--fit" id="kt_chat_aside">
    <div class="kt-portlet kt-portlet--last">
        <div class="kt-portlet__body">
            <div class="pull-right">
                <a href="{{ route('messages.start') }}" class="btn btn-clean btn-sm ">
                    <i class="flaticon2-add-1"></i> New Thread
                </a>
            </div>

            <div class="kt-widget kt-widget--users kt-mt-20">
                <div class="kt-scroll kt-scroll--pull">
                    <div class="kt-widget__items">
                        @if(count($threads) > 0)
                            @foreach($threads as $thread)
                            <div class="kt-widget__item">
                                <div class="kt-widget__info">
                                    <div class="kt-widget__section">
                                        <a href="{{ route('messages.thread',['id' => $thread->id]) }}" class="kt-widget__username">{{ $thread->subject }}</a>
                                        @if($thread->userUnreadMessagesCount(auth()->user()->id) > 0)
                                            <span class="kt-badge kt-badge--success kt-badge--dot"></span>
                                        @endif
                                    </div>

                                    <span class="kt-widget__desc">
                                        {{ $thread->participantsString(auth()->user()->id) }}
                                    </span>
                                </div>
                                <div class="kt-widget__action">
                                    <span class="kt-widget__date">{{ $thread->updated_at->diffForHumans() }}</span>
                                    @if($thread->userUnreadMessagesCount(auth()->user()->id) > 0)
                                        <span class="kt-badge kt-badge--success kt-font-bold">{{ $thread->userUnreadMessagesCount(auth()->user()->id) }}</span>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        @else
                            <em>You have no active message threads.</em>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>