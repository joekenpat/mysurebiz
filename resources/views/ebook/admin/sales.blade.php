@extends('layouts.template')
@section('title')
    Ebook Sales Report
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
            <div class="col-12 col-md-6">
                Total Sales : <span class="access-student">
                    &#8358;{{number_format($sum)}}
                </span>
            </div>
            <div class="col-12 col-md-6">
                <form method="post">
                    @csrf
                    <div class="input-group w-75 mx-auto">
                        <input type="text" name="title" class="form-control" placeholder="Search by ebook" aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button type="submit" class="input-group-text" id="payment-search"><i class="icon-arrow-right"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="notifications preview-list text-center">
        <h3 class="text-center font-weight-bold text-color-green mt-2">{{$title}}
            <span class="access-artisan d-inline-block">{{ $sales->total() }}</span>
        </h3>

        <div class="dropdown-divider"></div>
        <div class="dropdown-item preview-item row py-0 text-dark font-weight-bold">
            <div class="preview-item-content col-3 text-center">Buyer</div>
            <div class="preview-item-content col-3 text-center">Ebook</div>
            <div class="col-2">Reference</div>
            <div class="col-2">Date</div>
            <div class="col-2">Amount</div>
        </div>

        {{--Buttons--}}

        @forelse($sales as $sale)
            <div class="dropdown-divider"></div>
            <div class="dropdown-item preview-item row">
                <div class="preview-item-content col-3 text-center">
                    {{ $sale->email }}
                    <p class="font-weight-light small-text mt-2">
                        {{ $sale->name }}
                    </p>
                </div>
                <div class="col-3 pt-2 payment-ref">{{ $sale->title }}</div>
                <div class="col-2 pt-2 payment-ref">{{ $sale->ref }}</div>
                <div class="col-2 pt-2">{{ date('d/m/Y', strtotime($sale->created_at)) }}</div>
                <div class="preview-thumbnail col-2">
                    <div class="preview-icon my-button-gray payment-amount">
                        &#8358;{{$sale->price}}
                    </div>
                </div>
            </div>
            <div class="dropdown-divider"></div>
        @empty
            <div class="mt-4">No Ebook Sales yet!</div>
        @endforelse
        {{--@endif--}}
        {{ $sales->links() }}
    </div>
@endsection