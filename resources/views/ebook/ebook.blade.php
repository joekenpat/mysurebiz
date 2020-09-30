@extends('layouts.userstemplate')
@section('title', 'Dashboard')
@section('extraCss')
    <link rel="stylesheet" href="{{ asset('css/users/general.css') }}">
    <style>
        .content-wrapper {
            background: #f3f4f7;
        }
    </style>
@endsection
@section('extraScript')
@endsection

@section('sidebar')
    @include('layouts.sidebarcontents')
@endsection

@section('content')
    <div class="dashboard">
        <div class="row p-2 text-center">
            <div class="col-12 position-relative">
                <h4 class="mt-1" style="font-size: 1.2rem; color: green;">{{$ebook->title}}</h4>
                <div class="row">
                    <div class="col-12">
                        <div class="img-wrapper text-center position-relative">
                            <img class="img-fluid" src="{{$ebook->cover_image}}" alt=""
                                 style="max-width: 200px; max-height: 200px;">
                        </div>
                        <div class="text-center">
                            <div class="d-inline-block my-2" style="background-color: #cecbcb;
                            padding: 0.2rem 0.4rem;
                            border-radius: 10px;">
                                &#8358; {{ number_format($ebook->price) }}
                            </div>
                        </div>
                        <div class="course-note mt-3 mb-3">
                            {{--<h4>Lesson  Note</h4>--}}
                            {!! nl2br(e($ebook->description)) !!}
                        </div>
                        <div class="action mt-2">
                            <a href="{{ route('ebook-checkout', ['ebook-id' => $ebook->id]) }}"
                               class="my-button-green">Buy Now</a>
                            <div style="font-size: 0.8rem;" class="p-2">
                                Bought this before ?
                                <a href="{{ route('ebook-resend', ['ebook-id' => $ebook->id]) }}">Click here</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection