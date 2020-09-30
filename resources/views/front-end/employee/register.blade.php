@extends('front-end.layouts.template')

@section('title', 'Employees Registration')
@section('jumbotron-title', 'Employee Registration')
@section('action', 'Registration')
@section('extraCss')
    <link href="{{ asset('front-end/css/registration.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('front-end/css/wp-css.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('extraScript')
    <script>
        var blankProfilePhoto = "{{ asset('images/blank-profile-photo.png') }}";
    </script>
    <script src="{{ asset('front-end/js/employee-registration.js') }}"></script>
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

        {{--<div class="col-sm-6">--}}
            <div class="form-group col-sm-6">
                <label> Nature Of Job
                    <small>*</small> <i class="icon-question icon-size" data-toggle="tooltip" data-placement="top" title="The nature of your current job or job you retired from."></i>
                </label>
                <select name="nature_of_job" class="form-control" aria-required="true">
                    <option disabled selected>Choose...</option>
                    <option value="service">Services</option>
                    <option value="construction">Construction</option>
                    <option value="production"> Production</option>
                    <option value="civil servant">Civil Servant</option>
                    <option value="others">Others</option>
                </select>
            </div>
        {{--</div>--}}
        <div class="form-group col-sm-6">
            <label> Position At Current Job
                <small>*</small>
            </label>
            <input type="text" placeholder="e.g Junior staff" class="form-control" aria-required="true" name="position_at_job">
        </div>

            <div class="form-group col-sm-6">
                    <label> Do You Have Existing Business ?
                        <small>*</small>
                    </label>
                    <select name="existing_business" class="form-control" aria-required="true">
                        <option disabled selected>Choose...</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select>
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

        {{--<div class="form-group col-sm-6">--}}
            {{--<label> Monthly Pennywise--}}
                {{--<small>*</small> <i class="icon-question icon-size" data-toggle="tooltip" data-placement="top" title="This is the percentage of your salary to keep per month for the total period of your course."></i>--}}
            {{--</label>--}}
            {{--<select name="pennywise_percentage" class="form-control" aria-required="true">--}}
                {{--<option disabled selected>Choose...</option>--}}
                {{--<option value="20">20%</option>--}}
                {{--<option value="30">30%</option>--}}
                {{--<option value="40">40%</option>--}}
                {{--<option value="50">50%</option>--}}
                {{--<option value="60">60%</option>--}}
            {{--</select>--}}
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