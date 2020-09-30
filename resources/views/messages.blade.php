@extends('layouts.template')
@section('title', 'Sent Messages')
@section('extraCss')
    <link href="{{ asset('css/addcourse.css') }}" rel="stylesheet"/>
    <link href="{{ asset('css/messages.css') }}" rel="stylesheet"/>
@endsection
@section('extraScript')
    <script src="{{ asset('js/messages.js') }}"></script>
    <script>
        var url = "{{route('adminDeleteMessage')}}"
    </script>
@endsection
@section('content')
    <div>
        <a href="{{route('sendemail')}}" class="my-button-green">Send Message</a>
    </div>
    <div class="notifications preview-list">
        <h3 class="text-center font-weight-bold text-color-green mt-2">Scheduled Messages <span class="access-artisan d-inline-block">{{$messageCount}}</span></h3>
        @forelse($messages as $message)
               <div class="dropdown-item preview-item position-relative">
                @if(strtotime('now') > strtotime($message->schedule))
                    <i class="icon-check text-color-green" title="Message sent"></i>
                @else
                    <i class="icon-trash text-color-red" data-id="{{$message->id}}" title="Delete Message Schedule"></i>
                @endif
                <div class="bus-cat">
                    @foreach($message->audiences as $audience)
                        <span class="business-category text-color-green">{{$audience->period}} Months</span>
                    @endforeach
                </div>
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