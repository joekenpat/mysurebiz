@extends('layouts.userstemplate')
@section('title', 'Resend Ebook')
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
    <div class="row pt-5">
        <div class="add-course-wrapper offset-md-2 col-12 col-md-8 pt-5 pl-4 pl-md-5 pr-4 pr-md-5 pb-2">
            <h3 class="text-color-wheat add-funds"><i class="icon-lock"></i> Resend Ebook</h3>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form id="PaymentForm" method="Post">
                @csrf
                <input type="text" name="ebook_id" value="{{$ebook->id}}" hidden>

                <div class="form-group row">
                    <label for="inputPassword3" class="col-4 col-sm-5 col-form-label text-color-green font-weight-bold small-text-353">
                        <span class="d-none d-sm-inline">Book</span> Title
                    </label>
                    <div class="col-8 col-sm-7">
                        <div class="text-color-green col-form-label">
                            {{$ebook->title}}
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputPassword3" class="col-4 col-sm-5 col-form-label text-color-green font-weight-bold small-text-353">Email</label>
                    <div class="col-8 col-sm-7 text-color-green">
                        <div class="row">
                            <div class="col-12">
                                <input type="email"
                                       value="{{Auth::check() ? Auth::user()->email : null}}"
                                       class="form-control d-inline-block"
                                       name="email" required
                                       placeholder="Your Email Address"
                                >
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-12">
                        <p>
                            <strong class="text-danger">
                                Important Notice :
                            </strong>
                            Only users who have bought this book will be attended to.
                        </p>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-12 text-center">
                        <button class="btn btn-primary submit-addcourse small-text-353 payment-submit" type="submit" value="Pay Now!">
                            <i class="fa fa-plus-circle fa-lg"></i> Resend Ebook!
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection