@extends('layouts.template')
@section('title', $userInfo->first_name." ".$userInfo->last_name)
@section('extraClass', 'position-relative')
@section('content')
    @if($userInfo->image)
        <img class="img-fluid position-absolute profile-img" src="{{ asset('storage/'.$userInfo->image) }}" alt="">
    @else
        <img class="img-fluid position-absolute profile-img" src="{{ asset('images/blank-profile-photo.png') }}" alt="">
    @endif
    <div class="row">
    <div class="view-course profile position-relative mt-5 col-md-8 col-12 offset-md-2">
        <div class="info row mb-2">
            <div class="col-12 col-sm-6 text-small pt-5 pt-sm-0">
                Created on <label class="text-muted">{{ Carbon\Carbon::parse($userInfo->created_at)->format('Y-m-d') }}</label>
            </div>

            <div class="col-12 col-sm-6 text-sm-right">
                <span>{{ ucfirst(rtrim($userInfo->role, 's')) }}</span>
                @if($userInfo->status == 0)
                    <span class="status status-unverified"> <i class="icon-ban"></i> Unverified</span>
                @elseif($userInfo->status == 1)
                    <span class="status status-active"> <i class="icon-check"></i> Active</span>
                @elseif($userInfo->status == 2)
                    <span class="status status-disabled"> <i class="icon-ban"></i> Disabled</span>
                @endif

            </div>
        </div>
<div class="table-responsive">
        <table class="table table-striped">
            <tbody>
            <tr class="text-center">
                <td colspan="4"><a href="{{route('userspayment', ['user_id' => $userInfo->id])}}">View Payments</a></td>
            </tr>
            <tr>
                <th scope="row">First Name</th>
                <td colspan="3">{{ $userInfo->first_name }}</td>
            </tr>
            <tr>
                <th scope="row">Last Name</th>
                <td colspan="3">{{ $userInfo->last_name }}</td>
            </tr>
            <tr>
                <th scope="row">Gender</th>
                <td colspan="3">{{ $userInfo->gender }}</td>
            </tr>
            <tr>
                <th scope="row">Email</th>
                <td colspan="3">{{ $userInfo->email }}</td>
            </tr>
            <tr>
                <th scope="row">Home Address</th>
                <td colspan="3">{{ $userInfo->home_address }}</td>
            </tr>
            <tr>
                <th scope="row">Date of Birth</th>
                <td colspan="3">{{ Carbon\Carbon::parse($userInfo->dob)->format('Y-m-d') }}</td>
            </tr>
            <tr>
                <th scope="row">State of Origin</th>
                <td colspan="3">{{ $userInfo->state_of_origin }}</td>
            </tr>
            <tr>
                <th scope="row">Phone</th>
                <td colspan="3">{{ $userInfo->phone }}</td>
            </tr>
            <tr>
                <th scope="row">Batch</th>
                <td colspan="3">{{ $userInfo->batch_name ?? "N/A" }}</td>
            </tr>
            <tr class="green-header">
                <th scope="col" colspan="4">Next Of Kin</th>
            </tr>
            <tr>
                <th scope="row">Name</th>
                <td colspan="3">{{ $userInfo->name_next_of_kin }}</td>
            </tr>
            <tr>
                <th scope="row">Phone</th>
                <td colspan="3">{{ $userInfo->phone_next_of_kin }}</td>
            </tr>
            <tr>
                <th scope="row">State</th>
                <td colspan="3">{{ $userInfo->state_next_of_kin ?? 'N/A' }}</td>
            </tr>

            <tr class="green-header">
                <th scope="col" colspan="4">Business</th>
            </tr>
            <tr>
                <th scope="row">Business Category</th>
                <td colspan="3">{{ $userInfo->business_category }}</td>
            </tr>
            <tr>
                <th scope="row">Business of Interest</th>
                <td colspan="3">{{ $userInfo->business_of_interest ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th scope="row">Period</th>
                <td colspan="3">{{ $userInfo->period/12 }} yrs</td>
            </tr>
            <tr class="green-header">
                <th scope="col" colspan="4">Other Info</th>
            </tr>
            <tr>
                <th scope="row">Pennywise</th>
                <td colspan="3">
                    @if($userInfo->pennywise)
                        &#x20A6;{{$userInfo->pennywise}}
                    @else
                        {{'N/A'}}
                    @endif
                </td>
            </tr>

            @if($userInfo->role == 'Student')
                <tr>
                    <th scope="row">Name of School</th>
                    <td colspan="3">{{ $userInfo->name_of_school }}</td>
                </tr>
                <tr>
                    <th scope="row">School State</th>
                    <td colspan="3">{{ $userInfo->state_of_school }}</td>
                </tr>
                <tr>
                    <th scope="row">Course of Study</th>
                    <td colspan="3">{{ $userInfo->course }}</td>
                </tr>
                <tr>
                    <th scope="row">Parent/guardian Phone</th>
                    <td colspan="3">{{ $userInfo->parent_guardian_phone }}</td>
                </tr>
            @endif

            @if($userInfo->role == 'Artisan')
                <tr>
                    <th scope="row">trade</th>
                    <td colspan="3">{{ $userInfo->trade }}</td>
                </tr>
            @endif

            @if($userInfo->role == 'Employee')
                <tr>
                    <th scope="row">Nature of Job</th>
                    <td colspan="3">{{ $userInfo->nature_of_job }}</td>
                </tr>
                <tr>
                    <th scope="row">Position at Current Job</th>
                    <td colspan="3">{{ $userInfo->position_at_job }}</td>
                </tr>
                <tr>
                    <th scope="row">Pennywise Percentage</th>
                    <td colspan="3">{{ $userInfo->pennywise_percentage }}%</td>
                </tr>

                @if($userInfo->existing_business)
                <tr>
                    <th scope="row">Existing Business</th>
                    <td colspan="3">{{ $userInfo->existing_business }}</td>
                </tr>
                @endif
            @endif

            @if($userInfo->role == 'Admin')
                <tr>
                    <th scope="row">Function</th>
                    <td colspan="3">{{ $userInfo->function }}</td>
                </tr>
            @else
                <tr class="green-header">
                    <th scope="col" colspan="4">Trainings Report</th>
                </tr>
                <tr class="text-color-green text-center">
                    <th scope="row">Trainings</th>
                    <th colspan="3"><span>Progress</span></th>
                </tr>
                @forelse($userSubscribedCourses as $u)
                    <tr>
                        <th scope="row" style="white-space: unset;">
                            <a  class="text-color-link"
                                href="{{route('course-page', ['id' => $u->id])}}">
                                {{$u->title}}
                            </a>
                        </th>
                        <td colspan="3">
                            <div class="training-progress-wrapper" data-toggle="tooltip" data-placement="top" title="Training progress">
                                <div class="training-progress"
                                     style="width: {{$u->percentage}}%;
                                             background-color: {{$u->color}}">
                                    {{$u->percentage}}%
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center"><span>No training record.</span></td>
                    </tr>
                @endforelse
            @endif
            </tbody>
        </table>
</div>

    </div>
    </div>
@endsection