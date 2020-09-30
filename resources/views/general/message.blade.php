@php
    $message = $messages->first();
    $isAdmin = Auth::user()->isAdmin();
@endphp

@extends($isAdmin ? 'layouts.template' : 'layouts.userstemplate')

@if(!$isAdmin)
    {{--Message tracker--}}
    @section('extraScript')
        <script>
            var url = '{{ route('messagetracker', ['id' => $message->id]) }}';
            var id = '{{$message->id}}';
        </script>
        <script src="{{ asset('js/users/message.js') }}"></script>
    @endsection
    @section('extraCss')
        <link rel="stylesheet" href="{{ asset('css/users/general.css') }}">
        <link rel="stylesheet" href="{{ asset('css/users/message.css') }}">
    @endsection
@else
    @section('extraCss')
        <link rel="stylesheet" href="{{ asset('css/users/message.css') }}">
    @endsection
@endif

@section('title', 'Message: '.$message->subject)
@section('extraCss')
    <link rel="stylesheet" href="{{ asset('css/users/general.css') }}">
    <link rel="stylesheet" href="{{ asset('css/users/message.css') }}">
@endsection

@section('sidebar')
    @include('layouts.sidebarcontents')
@endsection

@section('content')
    <div class="notifications preview-list">
        <h3 class="text-center font-weight-bold text-color-green mt-2">{{$message->subject}}</h3>
            <div class="header-info">
                <div>
                    <img src="{{ $message->image ? asset('storage/'.$message->image) : asset('images/blank-profile-photo.png') }}"
                         alt="image" class="profile-pic">
                    <span>{{$message->first_name.' '.$message->last_name}}</span>
                </div>
                <div>
                    {{date('dS M, Y', strtotime($message->schedule))}}
                </div>
            </div>
        @if($isAdmin)
            <div class="px-1 bus-cat text-center pt-1">
                @foreach($audiences as $audience)
                    <span class="business-category text-color-green">{{$audience->period}} Months</span>
                @endforeach
            </div>
        @endif
            <div class="dropdown-divider"></div>
            <div href="#" class="dropdown-item message-content">
                {!! $message->content !!}
                    @if($message->attachment)
                        <div class="message-attachment text-center">
                            <span>Attachments</span>
                            @foreach($messages as $message)
                                <div class="course-material mt-2 d-inline-block p-1">
                                    <a href="{{ route('libraryfile', ['any' => $message->attachment]) }}" download>
                                        <i class="icon-cloud-download" data-toggle="tooltip" data-placement="top" title="delete file"></i>
                                        {{ explode('/', $message->attachment)[1]  }}
                                        <small class="text-muted">{{$message->attachment_size}}</small></a>
                                </div>
                                <br>
                            @endforeach
                        </div>
                    @endif
            </div>
    </div>
@endsection