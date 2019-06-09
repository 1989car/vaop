<div class="kt-chat">
    <div class="kt-portlet kt-portlet--head-lg kt-portlet--last">
        <div class="kt-portlet__head">
            <div class="kt-chat__head ">
                <div class="kt-chat__left">
                    <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md kt-hidden-desktop" id="kt_chat_aside_mobile_toggle">
                        <i class="flaticon2-open-text-book"></i>
                    </button>
                </div>

                <div class="kt-chat__center">
                    @if(count($thread->participantsUserIds()) == 1)
                        <div class="kt-chat__label">
                            <!-- @TODO: Add link to user profile -->
                            <a href="#" class="kt-chat__title">
                                {{ $thread->participantsString(auth()->user()->id) }}
                            </a>
                            <span class="kt-chat__status">
                                @if($thread->participantsString(auth()->user()->id,['is_staff']) == '1')
                                    Staff Member
                                @endif
                            </span>
                        </div>
                    @else
                        <div class="kt-chat__pic">
                            @foreach($thread->users as $participant)
                                <span class="kt-userpic kt-userpic--sm kt-userpic--circle" data-toggle="kt-tooltip" data-placement="top" title="{{ $participant->name }}" data-original-title="{{ $participant->name }}">
                                    <img src="{{ $participant->avatar_url }}" alt="{{ $participant->name }}">
                                </span>
                            @endforeach
                        </div>
                    @endif
                </div>

                <div class="kt-chat__right"></div>
            </div>
        </div>

        <div class="kt-portlet__body">
            <div class="kt-scroll kt-scroll--pull" data-mobile-height="300">
                <div class="kt-chat__messages">
                    @foreach($thread->messages as $message)
                        @include('messages.partials.message',['message' => $message])
                    @endforeach
                </div>
            </div>
        </div>

        <div class="kt-portlet__foot">
            <div class="kt-chat__input">
                <form class="kt-form" action="{{ route('messages.update',['id'=>$thread->id]) }}" method="post">
                    @csrf

                    <div class="kt-chat__editor">
                        <textarea style="height: 50px" id="message" name="message" placeholder="Type here..."></textarea>
                    </div>
                    <div class="kt-chat__toolbar">
                        <div class="kt_chat__tools">
                        </div>
                        <div class="kt_chat__actions">
                            <button type="submit" class="btn btn-primary btn-md btn-upper btn-bold kt-chat__reply">reply</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>