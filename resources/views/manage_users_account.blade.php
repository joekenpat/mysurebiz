@extends('layouts.template')
@section('title', $title)
@section('extraClass', 'p-0')
@section('extraScript')
    <script src="{{ asset('js/manageaccount.js') }}"></script>
@endsection
@section('content')
    @php
        $typeStr = $type === "" ? "All" : $type;
    @endphp
    <div class="courses w-100 text-center manage-account">
        <div class="row p-2">
            <div class="col-12 col-xl-2 d-none d-sm-block">
                <div class="form-group">
                    <select class="form-control" onchange="downloadNumbers(event)">
                        <option selected value="nil">
                            Download Phone Numbers
                        </option>
                        <option value="{{route('get-numbers', ['type' => $typeStr, 'status' => 'all'])}}">
                            Get {{$typeStr}} Phone Numbers
                        </option>
                        <option value="{{route('get-numbers', ['type' => $typeStr, 'status' => 'verified'])}}">
                            Get {{$typeStr}} Verified Numbers
                        </option>
                        <option value="{{route('get-numbers', ['type' => $typeStr, 'status' => 'unverified'])}}">
                            Get {{$typeStr}} Unverified Numbers
                        </option>
                    </select>
                </div>
            </div>
            <div class="col-12 col-xl-2 d-none d-sm-block">
                <div class="form-group">
                    <select class="form-control" onchange="downloadNumbers(event)">
                        <option selected value="nil">
                            Download Contacts By Batch
                        </option>
                        @foreach($batches as $batch)
                            <option value="{{route('get-numbers-by-batch', ['type' => $typeStr, 'batch_id' => $batch->id])}}">
                                Get {{ $batch->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-xl-2">
                <h4>{{$title}}</h4>
            </div>
            <div class="col-12 d-sm-none text-left mb-1">
                <div class="form-group">
                    <select class="form-control" onchange="downloadNumbers(event)">
                        <option selected value="nil">
                            Download Phone Numbers
                        </option>
                        <option value="{{route('get-numbers', ['type' => $typeStr, 'status' => 'all'])}}">
                            Get {{$typeStr}} Phone Numbers
                        </option>
                        <option value="{{route('get-numbers', ['type' => $typeStr, 'status' => 'verified'])}}">
                            Get {{$typeStr}} Verified Numbers
                        </option>
                        <option value="{{route('get-numbers', ['type' => $typeStr, 'status' => 'unverified'])}}">
                            Get {{$typeStr}} Unverified Numbers
                        </option>
                    </select>
                </div>
            </div>
            <div class="col-12 d-sm-none text-left mb-1">
                <div class="form-group">
                    <select class="form-control" onchange="downloadNumbers(event)">
                        <option selected value="nil">
                            Download Contacts By Batch
                        </option>
                        @foreach($batches as $batch)
                            <option value="{{route('get-numbers-by-batch', ['type' => $typeStr, 'batch_id' => $batch->id])}}">
                                Get {{ $batch->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-12 col-sm-4 col-xl-3">
                <form action="{{ route('mg-type')}}" method="POST">
                    @csrf
                    <input type="hidden" name="type" value="{{ $typeStr }}">
                    <div class="row">
                        <div class="col-4 col-sm-4 col-xl-4 input-group">
                            <select onchange="switchTypeDisplay(this)" id='switchType' class="form-control" name="switchType">
                                <option value="search-email">Email</option>
                                <option value="search-phone">Phone</option>
                                <option value="search-batch">Batch</option>
                            </select>
                        </div>
                        <div class="col-8 col-sm-8 col-xl-8 input-group">
                            <input type="hidden" id='searchtype' name="searchtype" value="email">
                            <input id='search-email' type="email" name="email" class="form-control" placeholder="Search Email" aria-label="Search Email">
                            <input id='search-phone' style="display: none" type="tel" name="phone" class="form-control" placeholder="Search Phone" aria-label="Search Phone">
                            <select id='search-batch' style="display: none" name="batch" class="form-control">
                                @foreach($batches as $batch)
                                    <option value="{{ $batch->id }}">
                                        {{ $batch->name }}
                                    </option>
                                @endforeach
                            </select>

                            <div class="input-group-append">
                                <button type="submit" class="input-group-text" id="library-search"><i class="icon-arrow-right"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="row font-none">
            <div class="col-1">#</div>
            <div class="col-5 col-xl-4 d-none d-sm-block">Name</div>
            <div class="col-8 col-md-3 col-xl-2 d-sm-none d-md-block">Email</div>
            <div class="col-sm-3 d-none d-sm-block d-md-none"><i class="icon-envelope"></i></div>
            <div class="duration col-2 d-none d-xl-block">Phone</div>
            <div class="col-1 d-none d-md-block">Status</div>
            <div class="col-1 d-md-none"><i class="icon-info"></i></div>
            <div class="col-1 d-none d-md-block">Action</div>
            <div class="col-1 d-md-none"><i class="icon-energy"></i></div>
            <div class="col-1 d-none d-md-block">Delete</div>
        </div>

        @forelse($users as $user)
        <div class="course-wrapper no-hover-effect row mt-1" id="{{ $user->id }}">
            <div class="col-1">{{ $loop->index + 1 }}</div>
            <div class="col-5 col-xl-4 d-none d-sm-block">
                {{ $user->first_name }} {{ $user->last_name }}
                <p>
                    <a href="{{ route('manage-account', ['type' => $user->role.'s']) }}" class="text-color-link business-category">
                        {{$user->role}}
                    </a>
                </p>
            </div>
            <div class="col-8 col-sm-3 col-xl-2 user-email"><a class="text-color-link" href="{{ route('user-page', ['id' => $user->id]) }}">{{ $user->email }}</a></div>
            <div class="col-2 d-none d-xl-block">{{ $user->phone }}</div>


                @if($user->status == 0)
                <div class="col-1"><i class="icon-lock text-danger" data-toggle="tooltip" data-placement="top" title="user not verified"></i></div>
                <div class="col-1 action">
                    <span class="status status-unverified d-none d-xl-inline-block py-0 px-2">unverified</span>
                    <i class="icon-info text-color-red d-xl-none" data-toggle="tooltip" data-placement="top" title="user not verified"></i>
                </div>
                @endif
                @if($user->status == 1)
                <div class="col-1"><i class="icon-check text-color-green" data-toggle="tooltip" data-placement="top" title="user active"></i></div>
                <div class="col-1 action">
                    <span class="my-button-red d-none d-xl-inline-block py-0 px-2 deactivate">Deactivate</span>
                    <i class="icon-ban text-danger d-xl-none deactivate" data-toggle="tooltip" data-placement="top" title="disable user"></i>
                </div>
                @endif
            @if($user->status == 2)
                <div class="col-1"><i class="icon-close text-danger" data-toggle="tooltip" data-placement="top" title="user disabled"></i></div>
                <div class="col-1 action">
                    <span class="my-button-green d-none d-xl-inline-block py-0 px-2 reactivate">reactivate</span>
                    <i class="icon-star text-color-green d-xl-none reactivate" data-toggle="tooltip" data-placement="top" title="Activate user"></i>
                </div>
            @endif

            <div class="col-1"><i class="icon-trash" data-toggle="tooltip" data-placement="top" title="delete user"></i></div>
        </div>
        @empty
            <div class="text-center">No record found!</div>
        @endforelse
        {{$users->links()}}
    </div>
    <script>
        function downloadNumbers(event) {
            if (event.target.value !== 'nil') {
                window.location.href = event.target.value;
            }
        }

        function switchTypeDisplay(el) {
            var value = (el.value || el.options[el.selectedIndex].value);  //crossbrowser solution =)
            var search = '';
            switch (value) {
                case 'search-email':
                    search = 'email';
                    hideElements('search-phone', 'search-batch');
                    break;
                case 'search-phone':
                    search = 'phone';
                    hideElements('search-email', 'search-batch');
                    break;
                case 'search-batch':
                    search = 'batch';
                    hideElements('search-email', 'search-phone');
            }
            document.getElementById('searchtype').value = search;
            document.getElementById(value).style.display = 'block';
        }


        function hideElements(el1, el2) {
            document.getElementById(el1).style.display = 'none';
            document.getElementById(el2).style.display = 'none';
        }
    </script>
@endsection
