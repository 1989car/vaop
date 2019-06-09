@if($message->user->id == auth()->user()->id)
    <div class="kt-chat__message kt-chat__message--right">
        <div class="kt-chat__user">
            <span class="kt-chat__datetime">{{ $message->created_at->diffForHumans() }}</span>
            <!-- @TODO: Add link to user profile -->
            <a href="#" class="kt-chat__username">You</a>
            <span class="kt-userpic kt-userpic--circle kt-userpic--sm">
                <img alt="Avatar" src="{{ auth()->user()->avatar_url }}" />
            </span>
        </div>
        <div class="kt-chat__text kt-bg-light-brand">
            {{ $message->body }}
        </div>
    </div>
@else
    <div class="kt-chat__message">
        <div class="kt-chat__user">
        <span class="kt-userpic kt-userpic--circle kt-userpic--sm">
            <img alt="Avatar" src="{{ $message->user->avatar_url }}" />
        </span>
        <!-- @TODO: Add link to user profile -->
        <a href="#" class="kt-chat__username">{{ $message->user->name }}</a>
        <span class="kt-chat__datetime">{{ $message->created_at->diffForHumans() }}</span>
        </div>
        <div class="kt-chat__text kt-bg-light-success">
            {{ $message->body }}
        </div>
    </div>
@endif
