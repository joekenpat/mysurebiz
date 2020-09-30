@extends('layouts.template')
@section('title', "Batches")
@section('extraClass', 'p-0')
@section('extraScript')
    <script src="{{ asset('js/manageaccount.js') }}"></script>
@endsection
@section('content')
    <div class="courses w-100 text-center manage-account">
        <div class="row p-2">
            <div class="col-4 col-xl-3 d-none d-sm-block">
                <a href="{{route('create-batch')}}" class="my-button-green d-inline-block">
                    Create Batch
                </a>
            </div>
            <div class="col-12 col-sm-4 col-xl-6">
                <h4>Batches</h4>
            </div>
            <div class="col-12 d-sm-none text-left mb-1">
                <a href="{{route('batches')}}" class="my-button-green d-inline-block add-library">
                    Create Batch
                </a>
            </div>
            <div class="col-12 col-sm-4 col-xl-3"></div>
        </div>

        <div class="row font-none">
            <div class="col-1">#</div>
            <div class="col-5">Name</div>
            <div class="col-4">Start Date</div>
            <div class="col-1 d-md-none" title="Status"><i class="icon-info"></i></div>
            <div class="d-none d-md-block col-md-1">Status</div>
            <div class="col-1 d-md-none" title="Edit"><i class="icon-energy"></i></div>
            <div class="d-none d-md-block col-md-1">Edit</div>
        </div>

        @forelse($batches as $batch)
            <div class="row font-none">
                <div class="col-1">
                    <span class="my-numbering">{{$loop->index + 1}}</span>
                </div>
                <div class="col-5">{{$batch->name}}</div>
                <div class="col-4">{{$batch->start_date->toDateString()}}</div>
                <div class="col-1">
                    @php
                        $now = \Carbon\Carbon::now();
                        $isStarted = $now->lt($batch->start_date) ? false : true;
                    @endphp
                    @if($isStarted)
                        <i class="icon-check text-color-green" title="Started"></i>
                    @else
                        <i class="icon-ban text-muted" title="Not Started"></i>
                    @endif
                </div>
                <div class="col-1">
                    @if($isStarted)
                        <i class="icon-pencil text-muted" style="pointer-events: none;" title="Cannot be edited."></i>
                    @else
                        <a href="{{route('edit-batch', ['id' => $batch->id])}}">
                            <i class="icon-pencil"></i>
                        </a>
                    @endif
                </div>
            </div>
        @empty
            <div class="text-center">No record found!</div>
        @endforelse
        {{$batches->links()}}
    </div>
@endsection