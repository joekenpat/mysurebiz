@extends('layouts.userstemplate')
@section('title', 'Messages')
@section('extraCss')
    <link rel="stylesheet" href="{{ asset('css/users/general.css') }}">
    <link rel="stylesheet" href="{{ asset('css/messages.css') }}">
    <style>
        .bg-success{
            background-color: unset !important;
        }
        .notifications .message-date {
            grid-column: 3;
            grid-row: 1;
        }
    </style>
@endsection
@section('extraScript')
    <script src="{{ asset('js/messages.js') }}"></script>
    <script>
        var url = "{{route('usersDeleteMessage')}}"
    </script>
@endsection

@section('sidebar')
    @include('layouts.sidebarcontents')
@endsection

@section('content')
    <div class="notifications preview-list">
        <h3 class="text-center font-weight-bold text-color-green mt-2">
            Messages
            <span class="access-artisan d-inline-block" title="Unread Messages">
                {{$unreadCount}}
            </span>
        </h3>
        @forelse($messages as $message)
            <div class="dropdown-item preview-item position-relative">
                <i class="icon-trash text-color-red" data-id="{{$message->id}}" title="Delete Message"></i>
                <div class="message-date">
                    {{date('dS M, Y', strtotime($message->schedule))}}
                </div>
                <div class="preview-thumbnail">
                    <img src="{{ $message->image ? asset('storage/'.$message->image) : asset('images/blank-profile-photo.png') }}" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content">
                    <a href="{{route('usersmessage', ['id' => $message->id])}}" class="preview-subject font-weight-medium text-color-link">{{$message->subject}}</a>
                    <p class="font-weight-light small-text mt-1">
                        <small class="muted">{{$message->first_name.' '.$message->last_name}}</small>
                    </p>
                </div>
            </div>
        @empty
            <div class="dropdown-divider"></div>
            <div class="text-center">No Message</div>
        @endforelse
        {{ $messages->links() }}
    </div>
@endsection