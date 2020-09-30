@extends('layouts.template')
@section('title', 'Training Name')
@section('content')
    <div class="row">
    <div class="view-course completed-course-page col-12 col-md-8 offset-md-2 p-0">
        <h3>Project Management Training</h3>

        <div class="row font-none font-weight-bold text-color-green">
            <div class="col-1">#</div>
            <div class="col-8">Users</div>
            <div class="col-3">Progress</div>
        </div>

        <div class="row mt-1">
            <div class="col-1"><span class="number">1</span></div>
            <div class="col-8"><a class="text-color-link" href="">Users@mymail.co</a></div>
            <div class="col-3"><span class="my-button-green py-1 px-2">100%</span></div>
        </div>

        <div class="row mt-1">
            <div class="col-1"><span class="number">2</span></div>
            <div class="col-8"><a class="text-color-link" href="">Users@mymail.co</a></div>
            <div class="col-3"><span class="my-button-gray py-1 px-2">40%</span></div>
        </div>

    </div>
    </div>
@endsection