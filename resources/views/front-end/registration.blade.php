@extends('front-end.layouts.template')

@section('title', 'Registration')
@section('jumbotron-title', 'Registration')
@section('action', 'Registration')
@section('extraCss')
	{{--<link href="{{ asset('front-end/css/registration.css') }}" rel="stylesheet" type="text/css">--}}
@endsection

@section('extraScript')

@endsection

@section('main')
	<section>
		<div class="container pb-0">
			<div class="row text-center">
				<div class="col-sm-4">
					<div class="icon-box iconbox-border iconbox-theme-colored p-40">
						<a href="{{ route('student-register') }}" class="icon icon-gray icon-bordered icon-circled icon-border-effect effect-circled">
							<i class="pe-7s-users"></i>
						</a>
						<h5 class="icon-box-title">Student Mysurebiz (SM)</h5>
						<p class="text-gray">This type of account is meant for student of different tertiary institutions in Nigeria.</p>
						<a class="btn btn-dark btn-sm mt-15" href="{{ route('student-register') }}">Sign Up</a>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="icon-box iconbox-border iconbox-theme-colored p-40">
						<a href="{{ route('artisan-register') }}" class="icon icon-gray icon-bordered icon-rounded icon-circled icon-border-effect effect-circled">
							<i class="pe-7s-users"></i>
						</a>
						<h5 class="icon-box-title">Artisan Mysurebiz (AM)</h5>
						<p class="text-gray">This type of account is meant for artisans who is based in a type of trade</p>
						<a class="btn btn-dark btn-sm mt-15" href="{{ route('artisan-register') }}">Sign Up</a>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="icon-box iconbox-border iconbox-theme-colored p-40">
						<a href="{{ route('employee-register') }}" class="icon icon-gray icon-bordered icon-circled icon-border-effect effect-circled">
							<i class="pe-7s-users"></i>
						</a>
						<h5 class="icon-box-title">Employee Mysurebiz (EM)</h5>
						<p class="text-gray">This Type of Account is made for the working class participants.</p>
						<a class="btn btn-dark btn-sm mt-15" href="{{ route('employee-register') }}">Sign Up</a>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection
