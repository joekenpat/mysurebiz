@php
    $isAdmin = Auth::user()->isAdmin();
@endphp

@extends($isAdmin ? 'layouts.template' : 'layouts.userstemplate')

@section('title', 'Welcome Note')

@section('extraCss')
    @if(!$isAdmin)
        <link rel="stylesheet" href="{{ asset('css/users/general.css') }}">
    @endif
    <link rel="stylesheet" href="{{ asset('css/users/message.css') }}">
@endsection

@section('sidebar')
    @include('layouts.sidebarcontents')
@endsection

@section('content')
    <div class="notifications preview-list">
        <h3 class="text-center font-weight-bold text-color-green mt-2">WELCOME NOTE</h3>
        <div href="#" class="dropdown-item message-content">
            {!! $welcome_note->content !!}
            @if($welcome_note->video)
                <div class="embed-responsive embed-responsive-16by9 course-video mx-auto">
                    <iframe class="embed-responsive-item" src="{{ $welcome_note->video }}" allowfullscreen></iframe>
                </div>
            @endif
        </div>
    </div>
@endsection