@php
    $isAdmin = Auth::user()->isAdmin();
@endphp

@extends($isAdmin ? 'layouts.template' : 'layouts.userstemplate')

@section('title', 'Penny Wise Report')

@section('extraCss')
    @if(!$isAdmin)
        <link rel="stylesheet" href="{{ asset('css/users/general.css') }}">
        @else
        <style>
            .piecharts {
                height: 250px;
            }
        </style>
    @endif
    <link rel="stylesheet" href="{{ asset('css/payments.css') }}">
    <link rel="stylesheet" href="{{ asset('css/users/payment-report.css') }}">
@endsection
@section('extraScript')

@endsection

@section('sidebar')
    @include('layouts.sidebarcontents')
@endsection

@section('content')
    <div class="dashboard">
        <div class="row">
            <div class="piecharts offset-1 col-10 offset-sm-2 col-sm-8 offset-md-3 col-md-6 mt-3 mt-md-0">
                <div class="m-1 my-display-cards w-100 p-3">
                    <h3 class="text-color-green">Total Penny Wise <span class="float-right my-button-green reduce-font-pad">&#8358;{{ number_format($totalPayments) }}</span></h3>
                    <div class="w-100 mt-3">
                        Total period
                        <small><i class="icon-question" data-toggle="tooltip" data-placement="top" title="Total period of trainings subscribed to in days"></i></small>
                        <span class="float-right access-employee">{{ $noOfDays }}</span></div>
                    <div class="w-100 mt-4">
                        Penny Wise days kept <small><i class="icon-question" data-toggle="tooltip" data-placement="top" title="Number of days of Penny Wise kept"></i></small>
                        <span class="float-right access-student">
                            {{ $noOfdaysPayed }}
                        </span>
                    </div>
                    <div class="w-100 mt-3">Penny Wise days left
                        <small><i class="icon-question" data-toggle="tooltip" data-placement="top" title="Number of days of Penny Wise remaining"></i></small>
                        <span class="float-right access-artisan">
                            {{ $noOfDays - $noOfdaysPayed }}
                        </span>
                    </div>
                    @if($isAdmin)
                        <div class="w-100 mt-3">User
                            <span class="float-right">
                                <a href="{{ route('user-page', ['id' => $userId]) }}" class="preview-subject font-weight-medium text-color-link">
                                {{ $userEmail }}
                            </a>
                        </span>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>

    <div class="notifications preview-list text-center">
        <h3 class="text-center font-weight-bold text-color-green mt-2">Penny Wise
            <span class="access-artisan d-inline-block">{{ $payments->total() }}</span>
        </h3>

        <div class="dropdown-divider"></div>
        <div class="dropdown-item preview-item row py-0 text-dark font-weight-bold">
            <div class="preview-item-content col-1 text-center">#</div>
            <div class="col-5">Reference</div>
            <div class="col-3">Date</div>
            <div class="col-3">Amount</div>
        </div>

        @forelse($payments as $payment)
            <div class="dropdown-divider"></div>
            <div class="dropdown-item preview-item row">
                <div class="preview-item-content col-1 text-center">
                    <span class="number">{{ $loop->index + 1 }}</span>
                </div>
                <div class="col-5 payment-ref">{{ $payment->reference }}</div>
                <div class="col-3 payment-date">
                    {{ date('d/m/Y', strtotime($payment->created_at)) }}
                </div>
                <div class="preview-thumbnail col-3 payment-amount">
                    <div class="preview-icon my-button-gray">
                        &#8358;{{ $payment->amount }}
                    </div>
                </div>
            </div>
            <div class="dropdown-divider"></div>
        @empty
            <div class="mt-4">No Penny Wise yet!</div>
        @endforelse
        {{ $payments->links() }}
    </div>
@endsection