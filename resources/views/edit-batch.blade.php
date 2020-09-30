@extends('layouts.template')
@section('title', 'Add Course')
@section('extraCss')
    <link href="{{ asset('css/addcourse.css') }}" rel="stylesheet"/>
@endsection
@section('extraScript')
    @include('partials.batch.batch-js',
    ['batchUrl' => route('edit-batch', ['id' => $batch->id]), 'isEdit' => true]
    )
@endsection
@section('content')
    @include('partials.batch.batch', [
    'title' => "Edit",
    'name' => $batch->name,
    'start_date' => $batch->start_date->toDateString()
    ])
@endsection