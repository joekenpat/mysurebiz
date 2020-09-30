@extends('layouts.template')
@section('title')
    Keep Report
@endsection
@section('extraCss')
    <link rel="stylesheet" href="{{ asset('css/payments.css') }}">
@endsection
@section('extraClass', 'p-0')
@section('extraScript')
    <script src="{{ asset('js/payments.js') }}"></script>
@endsection

@section('content')
    {{--{{ dd($unscoredAssignments) }}--}}
    <div class="payment-links mx-auto mt-4">
        <div class="row">
            <div class="col-12 col-md-6 text-center">
                <ul>
                    <li><a href="{{ route('payments') }}">All</a></li>
                    <li><a href="{{ route('payments', ['type' => 'students']) }}">Students</a></li>
                    <li><a href="{{ route('payments', ['type' => 'artisans']) }}">Artisans</a></li>
                    <li><a href="{{ route('payments', ['type' => 'employees']) }}">Employees</a></li>
                </ul>
            </div>
            <div class="col-12 col-md-6">
                <form action="{{ route('payments') }}" method="post">
                    @csrf
                    <div class="input-group w-75 mx-auto">
                        <input type="text" name="email" class="form-control" placeholder="Search by email" aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button type="submit" class="input-group-text" id="payment-search"><i class="icon-arrow-right"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="notifications preview-list text-center">
        <h3 class="text-center font-weight-bold text-color-green mt-2">Keeps
            <span class="access-artisan d-inline-block">{{ $payments->total() }}</span>
        </h3>

        <div class="dropdown-divider"></div>
        <div class="dropdown-item preview-item row py-0 text-dark font-weight-bold">
            <div class="preview-item-content col-5 text-center">Email</div>
            <div class="col-4 col-sm-3">Reference</div>
            <div class="col-2 d-none d-sm-block">Date</div>
            <div class="col-3 col-sm-2">Amount</div>
        </div>

        {{--Buttons--}}

            @forelse($payments as $payment)
                <div class="dropdown-divider"></div>
                <div class="dropdown-item preview-item row">
                    <div class="preview-item-content col-5 text-center">
                        <a href="{{ route('user-page', ['id' => $payment->user_id]) }}" class="preview-subject font-weight-medium text-color-link">
                            {{ $payment->email }}
                        </a>
                        @php
                            $role = ($payment->role == 1)?"Student":(($payment->role == 2)?"Artisan":(($payment->role == 3)?"Employee":""));
                        @endphp
                        <p class="font-weight-light small-text mt-2">
                            {{ $role }}
                        </p>
                    </div>
                    <div class="col-4 col-sm-3 pt-2 payment-ref">{{ $payment->reference }}</div>
                    <div class="col-2 pt-2 d-none d-sm-block">{{ date('d/m/Y', strtotime($payment->created_at)) }}</div>
                    <div class="preview-thumbnail col-3 col-sm-2">
                        <div class="preview-icon my-button-gray payment-amount">
                            &#8358;{{$payment->amount}}
                        </div>
                    </div>
                </div>
                <div class="dropdown-divider"></div>
            @empty
                <div class="mt-4">No payments yet!</div>
            @endforelse
        {{--@endif--}}
        {{ $payments->links() }}
    </div>
@endsection