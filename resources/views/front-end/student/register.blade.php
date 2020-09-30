@extends('front-end.layouts.template')

@section('title', ucfirst($type).' Registration')
@section('action', ucfirst($type).' Registration')
@section('extraCss')
	<link href="{{ asset('front-end/css/registration.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('front-end/css/wp-css.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('extraScript')
    <script>
        var blankProfilePhoto = "{{ asset('images/blank-profile-photo.png') }}";
    </script>
    <script src="{{ asset('front-end/js/student-registration.js') }}"></script>
    <script src="{{ asset('front-end/js/general-registration.js') }}"></script>
	<script src="{{ asset('front-end/js/terms.js') }}"></script>
@endsection

@section('main')

	@include('front-end.partials.registration-form')
						<div class="form-group col-sm-6">
							<label>Parent/Guardian Phone</label>
							<input type="text" placeholder="e.g. 080..." name="parent_guardian_phone" class="form-control" aria-required="true">
						</div>

					</div>

					<div class="mb-3 p-0 mx-auto green-bottom-shadow">
						<div class="d-inline-block py-1 px-2 green-white-bg">Education</div>
					</div>

					<div class="row">

						<div class="form-group col-sm-6">
							<label>Name of School
								<small>*</small>
							</label>
							<input type="text" placeholder="Your school name" name="name_of_school" class="form-control" aria-required="true">
						</div>
						<div class="form-group col-sm-6">
							<label>State of School
								<small>*</small>
							</label>
							<input type="text" placeholder="School state" class="form-control" name="state_of_school" aria-required="true">
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label> Level Category
									<small>*</small> <i class="icon-question icon-size" data-toggle="tooltip" data-placement="top" title="This determines the period you will have access to the system."></i>
								</label>
								<select name="period" class="form-control" aria-required="true">
									<option disabled selected>Choose...</option>
									<option value="12">Regular 1 (100L)</option>
									<option value="24">Regular 2 (200L)</option>
									<option value="36">Regular 3 (300L)</option>
									<option value="48">Basic 2 (400L)</option>
									<option value="60">Basic 1 (500L/NYSC)</option>
								</select>
							</div>
						</div>
						<div class="form-group col-sm-6">
							<label>Course of Study
								<small>*</small>
							</label>
							<input type="text" placeholder="Course" name="course" class="form-control" aria-required="true">
						</div>

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