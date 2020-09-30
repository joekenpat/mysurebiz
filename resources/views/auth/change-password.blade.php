@extends('layouts.template')
@section('title', 'Change Password')
@section('extraScript')

@endsection
@section('content')
    <div class="row pt-5">
        <div class="add-course-wrapper offset-md-2 col-12 col-md-8 pt-5 pl-5 pr-5 pb-2">
            <h3 class="text-color-wheat password-change"><i class="icon-lock"></i> Change Password</h3>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(Session::has('message'))
                <div class="alert {{ Session::get('alert-class', 'alert-success') }}">
                    <ul>
                        <li>{{ Session::get('message') }}</li>
                    </ul>
                </div>
            @endif

            <form method="Post" action="{{ route('userschangepassword') }}">
                @csrf

                {{--<div class="form-group row text-center">--}}
                {{--<label for="inputPassword3" class="col-12 col-form-label text-color-green font-weight-bold">Amount</label>--}}
                {{--<div class="col-12">--}}
                {{--<div class="d-inline-block text-color-green naira">&#8358;</div> <input type="text" class="form-control w-75 d-inline-block" name="amount" placeholder="e.g 5000">--}}
                {{--</div>--}}
                {{--</div>--}}

                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label text-color-green font-weight-bold">Current Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="old_password" placeholder="Current password">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label text-color-green font-weight-bold">New Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="new_password" placeholder="New password">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label text-color-green font-weight-bold">Confirm Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" name="new_password_confirmation" placeholder="Confirm new password">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-12 text-center">
                        <button class="btn btn-primary submit-addcourse" type="submit">
                            Submit
                        </button>
                        {{--<button type="submit" class="btn btn-primary submit-addcourse">Fund Now!</button>--}}
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection