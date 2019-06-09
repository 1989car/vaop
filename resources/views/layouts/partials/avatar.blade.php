us@if(auth()->user()->avatar_url !== null && auth()->user()->avatar_url !== '')
    <img alt="Pic" src="{{ env('UPLOADS_BASE_URL').auth()->user()->avatar_url }}" />
@else
    <img alt="Pic" src="https://www.gravatar.com/avatar/{{ md5(auth()->user()->email) }}?s=60" />
@endif