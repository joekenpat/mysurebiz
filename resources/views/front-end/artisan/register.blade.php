@extends('front-end.layouts.template')

@section('title', 'Artisans Registration')
@section('jumbotron-title', 'Artisan Registration')
@section('action', 'Registration')
@section('extraCss')
    <link href="{{ asset('front-end/css/registration.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('front-end/css/wp-css.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('extraScript')
    <script>
        var blankProfilePhoto = "{{ asset('images/blank-profile-photo.png') }}";
    </script>
    <script src="{{ asset('front-end/js/artisan-registration.js') }}"></script>
    <script src="{{ asset('front-end/js/general-registration.js') }}"></script>
    <script src="{{ asset('front-end/js/terms.js') }}"></script>
@endsection

@section('main')

    @include('front-end.partials.registration-form')

    </div>

    <div class="mb-3 p-0 mx-auto green-bottom-shadow">
        <div class="d-inline-block py-1 px-2 green-white-bg">Business</div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label> Business Category
                    <small>*</small> <i class="icon-question icon-size" data-toggle="tooltip" data-placement="top" title="Category of the business you wish to start"></i>
                </label>
                <select name="business_category" class="form-control" aria-required="true">
                    <option disabled selected>Choose...</option>
                    @foreach($businessCategories as $businessCategory)
                        <option value="{{ $businessCategory->id }}">{{ $businessCategory->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group col-sm-6">
            <label>Business Of Interest</label>
            <input type="text" placeholder="Interests..." class="form-control" aria-required="true" name="business_of_interest">
        </div>

        <div class="col-sm-6">
            <div class="form-group">
                <label>Trade
                    <small>*</small> <i class="icon-question icon-size" data-toggle="tooltip" data-placement="top" title="What do you trade on?"></i>
                </label>
                <input type="text" placeholder="Your trade" class="form-control" aria-required="true" name="trade">
            </div>
        </div>
        <div class="form-group col-sm-6">
            <label> Desired period
                <small>*</small> <i class="icon-question icon-size" data-toggle="tooltip" data-placement="top" title="This is the period you will have access to the system resources."></i>
            </label>
            <select name="period" class="form-control" aria-required="true">
                <option disabled selected>Choose...</option>
                <option value="6">Regular 1 (6 Months)</option>
                <option value="12">Regular 2 (12 Months)</option>
                <option value="18">Regular 3 (18 Months)</option>
                <option value="24">Regular 4 (24 Months)</option>
                <option value="30">Basic 2 (30 Months)</option>
                <option value="36">Basic 1 (36 Months)</option>
            </select>
        </div>

        {{--<div class="col-sm-6">--}}
            {{--<div class="form-group">--}}
                {{--<label> Daily Pennywise--}}
                    {{--<small>*</small> <i class="icon-question icon-size" data-toggle="tooltip" data-placement="top" title="This is the amount of tokens you keep per day for the total period of your course."></i>--}}
                {{--</label>--}}
                {{--<select name="pennywise" class="form-control" aria-required="true">--}}
                    {{--<option disabled selected>Choose...</option>--}}
                    {{--<option value="200">&#x20A6; 200</option>--}}
                    {{--<option value="300">&#x20A6; 300</option>--}}
                    {{--<option value="400">&#x20A6; 400</option>--}}
                    {{--<option value="500">&#x20A6; 500</option>--}}
                    {{--<option value="600">&#x20A6; 600</option>--}}
                    {{--<option value="700">&#x20A6; 700</option>--}}
                    {{--<option value="800">&#x20A6; 800</option>--}}
                    {{--<option value="900">&#x20A6; 900</option>--}}
                    {{--<option value="1000">&#x20A6; 1000</option>--}}
                {{--</select>--}}
            {{--</div>--}}
        {{--</div>--}}

        @include('front-end.partials.Pennywise')
        @include('front-end.partials.terms-check-box')

    </div>
    <div class="text-center">
        <button type="submit" disabled class="btn btn-default">Register Now</button>
    </div>

    </form>
    @include('front-end.partials.terms-conditions')
    </div>
    </div>
    </div>
@endsection