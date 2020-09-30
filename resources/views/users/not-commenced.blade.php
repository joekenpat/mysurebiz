@extends('layouts.not-commenced-template')
@section('title', 'Training Not Commenced')
@section('extraCss')
    <link rel="stylesheet" href="{{ asset('css/users/general.css') }}">
@endsection
@section('extraScript')
    <script src="{{ asset('js/users/general.js') }}"></script>
@endsection

@section('content')
    <div class="w-100 mt-sm-4">
        <div class="row dashboard-welcome">
            <div class="col-12 text-center my-3">
                <div class="d-inline-block">
                        <span class="first-welcome" style="display: none;">
                            We welcome you to the Biggest and All Encompass Business Empowerment Program, MYSUREBIZ.
                        </span>
                    <br>
                    <span class="second-welcome" style="display: none;">
                        Your training starts on <span class="access-student">{{$date}}</span>. Thanks as we expect you on that day!
                    </span>
                </div>
            </div>
        </div>
    </div>
    {{--Referral url--}}
    <div class="mt-3" style="
    text-align: center; position: absolute; bottom: 70px;
    left: 50%; transform: translate(-50%, 0);">
        <span class="access-artisan">Referral url</span>
        <span class="referral">
            {{ route('reg', ['type' => strtolower(Auth::user()->role), 'ref_by' => Auth::user()->ref_code]) }}
        </span>
    </div>
@endsection