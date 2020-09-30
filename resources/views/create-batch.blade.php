@extends('layouts.template')
@section('title', 'Add Course')
@section('extraCss')
    <link href="{{ asset('css/addcourse.css') }}" rel="stylesheet"/>
@endsection
@section('extraScript')
    @include('partials.batch.batch-js',
    ['batchUrl' => route('create-batch'), 'isEdit' => false]
    )
@endsection
@section('content')
    @include('partials.batch.batch', [
    'title' => "Create",
    'name' => null,
    'start_date' => null
    ])
@endsection