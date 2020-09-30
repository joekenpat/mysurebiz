<div class="container">
		<div class="row">
			<div style="" class="col-md-8 mx-auto">
				<div class="heading-line-bottom">
						<a href="{{env('APP_HOME_URL', 'https://www.mysurebiz.com')}}">< Back to Homepage</a>
					<h4 class="heading-title">Have an Account?
						<a href="{{ route('login') }}" style="color: #f48637;">Login</a>
					</h4>
					@php
						$refStr = ($ref_by !== null) ? '/'.$ref_by : '';
					@endphp

					@if($type != 'student')
						<h4 class="heading-title">Register as a Student?
							<a href="{{ route('reg', ['type' => 'student']).$refStr }}" style="color: #f48637;">Click here</a>
						</h4>
					@endif
					@if($type != 'artisan')
						<h4 class="heading-title">Register as an Artisan?
							<a href="{{ route('reg', ['type' => 'artisan']).$refStr }}" style="color: #f48637;">Click here</a>
						</h4>
					@endif
					@if($type != 'employee')
						<h4 class="heading-title">Register as an Employee?
							<a href="{{ route('reg', ['type' => 'employee']).$refStr }}" style="color: #f48637;">Click here</a>
						</h4>
					@endif
				</div>
				<form action="#" name="Register" method="post" enctype="multipart/form-data" id="Register">
					@csrf
					@if($ref_by !== null)
						<input type="text" value="{{$ref_by}}" name="ref_by" hidden>
					@endif

					<div class="mb-3 p-0 mx-auto green-bottom-shadow">
						<div class="d-inline-block py-1 px-2 green-white-bg">Personal</div>
					</div>
					<div class="w-100 text-center">
						<img class="profile-img-upload" src="{{ asset('images/blank-profile-photo.png') }}" alt="">
						<br>
						<input name="image" accept="image/*" type="file" required hidden>
						<span id="upload-image" class="my-2 d-inline-block gray-btn">upload profile photo</span>
					</div>
					<div class="row">
						<div class="form-group col-sm-6 ">
							<label>First Name
								<small>*</small>
							</label>
							<input type="text" placeholder="First Name" class="form-control" name="first_name">
						</div>
						<div class="form-group col-sm-6">
							<label>Last Name
								<small>*</small>
							</label>
							<input type="text" placeholder="Last Name" class="form-control" name="last_name">
						</div>
						<div class="form-group col-sm-6">
							<label>Email Address
								<small>*</small>
							</label>
							<input type="email" placeholder="example@example.com" class="form-control" name="email">
						</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label>Gender
									<small>*</small>
								</label>
								<select name="gender" class="form-control" aria-required="true">
									<option disabled selected>Choose...</option>
									<option value="male">Male</option>
									<option value="female">Female</option>
								</select>
							</div>
						</div>
						<div class="form-group col-sm-6">
							<label>Password
								<small>*</small>
							</label>
							<input type="password" id="password" placeholder="Password" name="password" class="form-control">
						</div>
						<div class="form-group col-sm-6">
							<label>Confirm Password
								<small>*</small>
							</label>
							<input type="password" placeholder="Repeat password" name="password_confirmation" class="form-control">
						</div>
						<div class="form-group col-sm-6">
							<label>Home Address
								<small>*</small>
							</label>
							<textarea placeholder="Your address..." type="text" rows="2" class="form-control" name="home_address"></textarea>
						</div>
						<div class="form-group col-sm-6">
							<label>Date Of Birth
								<small>*</small>
							</label>
							<input placeholder="yyyy-mm-dd" type="text" id="datepicker" class="form-control" name="dob">
						</div>
						<div class="form-group col-sm-6">
							<label>Phone Number
								<small>*</small>
							</label>
							<input placeholder="e.g. 080..." type="text" class="form-control" class="form-control" name="phone">
						</div>
						<div class="form-group col-sm-6">
							<label>State Of Origin
								<small>*</small>
							</label>
							<input placeholder="State" type="text" class="form-control" name="state_of_origin">
						</div>
						<div class="form-group col-sm-6">
							<label>Resident State</label>
							<input type="text" placeholder="State of residency" class="form-control" name="resident_state" aria-required="true">
						</div>
					</div>

						<div class="mb-3 p-0 mx-auto green-bottom-shadow">
							<div class="d-inline-block py-1 px-2 green-white-bg">Others</div>
						</div>

					<div class="row">

						<div class="form-group col-sm-6">
							<label>Name Next of Kin
								<small>*</small>
							</label>
							<input placeholder="your next of Kin" type="text" class="form-control" name="name_next_of_kin">
						</div>
						<div class="form-group col-sm-6">
							<label>Phone Next Of Kin
								<small>*</small>
							</label>
							<input placeholder="e.g. 080..." type="text" class="form-control" name="phone_next_of_kin">
						</div>
						<div class="form-group col-sm-6">
							<label>State Next Of Kin</label>
							<input type="text" placeholder="State of Next of Kin" class="form-control" name="state_next_of_kin">
						</div>