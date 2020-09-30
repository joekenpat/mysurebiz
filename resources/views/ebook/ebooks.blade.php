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
                <h4 class="mt-1" style="font-size: 1.2rem; color: green;">Ebooks</h4>
            </div>
        </div>
        <div class="row">
            @each('ebook.partials.card', $ebooks, 'ebook', 'ebook.empty')
        </div>
    </div>
@endsection