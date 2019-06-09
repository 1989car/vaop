@extends('layouts.app')

@section('title','My Messages')

@section('content')
    <div class="kt-grid kt-grid--desktop kt-grid--ver kt-grid--ver-desktop kt-app">
        <button class="kt-app__aside-close" id="kt_chat_aside_close">
            <i class="la la-close"></i>
        </button>

        @include('messages.partials.sidebar')

        <div class="kt-grid__item kt-grid__item--fluid kt-app__content" id="kt_chat_content">
            @include('messages.partials.create')
        </div>
    </div>
@endsection