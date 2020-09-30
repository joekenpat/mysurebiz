@extends('layouts.template')
@section('title', $title)
@section('extraClass', 'p-0')
@section('extraScript')
    <script src="{{ asset('js/manageebooks.js') }}"></script>
@endsection
@section('content')

    <div class="courses w-100 text-center manage-account">
        <div class="row p-2">
            <div class="col-4 col-xl-2 d-none d-sm-block">
                <a href="{{ route('create-ebook') }}" class="my-button-green d-inline-block">Add Ebook</a>
            </div>
            <div class="col-12 col-sm-4 col-xl-6 ">
                <h4>{{ $title }}</h4>
            </div>
            <div class="col-12 d-sm-none text-left mb-1">
                <a href="{{ route('create-ebook') }}" class="my-button-green d-inline-block add-library">Add Ebook</a>
            </div>
            <div class="col-12 col-sm-4 col-xl-4">
                <form action="{{ route('admin-ebooks') }}" method="post">
                    @csrf
                    <div class="input-group">
                        <input type="text" name="searchQuery" required class="form-control" placeholder="Search" aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button type="submit" class="input-group-text" id="library-search"><i class="icon-arrow-right"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="row font-none">
            <div class="col-1">#</div>
            <div class="col-6">Title</div>
            {{--<div class="col-sm-3 d-none d-sm-block d-md-none"><i class="icon-envelope"></i></div>--}}
            <div class="col-1">Status</div>
            {{--<div class="col-1 d-md-none"><i class="icon-info"></i></div>--}}
            <div class="col-3">Action</div>
            <div class="col-1">Edit</div>
            {{--<div class="col-1 d-md-none"><i class="icon-energy"></i></div>--}}
        </div>

        @forelse($ebooks as $ebook)
            <div class="course-wrapper no-hover-effect row mt-1" id="{{ $ebook->id }}">
                <div class="col-1">{{ $loop->index + 1 }}</div>
                <div class="col-6 ebook-title">
                    <a href="{{ route('ebook', ['ebook_id' => $ebook->id]) }}" target="_blank" class="text-color-link">
                        {{$ebook->title}}
                    </a>
                    @if($ebook->users)
                        <span class="d-block text-color-green business-category mt-1">
                            Users
                        </span>
                    @endif
                    @if($ebook->non_users)
                        <span class="d-block text-color-green business-category mt-1">
                            Non Users
                        </span>
                    @endif
                </div>

                @if($ebook->status == 0)
                    <div class="col-1"><i class="icon-close text-danger" data-toggle="tooltip" data-placement="top" title="Ebook deactivated"></i></div>
                    <div class="col-3 action">
                        <span class="my-button-green d-none d-sm-inline-block py-0 px-2 reactivate">reactivate</span>
                        <i class="icon-star text-color-green d-sm-none reactivate" data-toggle="tooltip" data-placement="top" title="Activate Ebook"></i>
                    </div>
                @endif
                @if($ebook->status == 1)
                    <div class="col-1"><i class="icon-check text-color-green" data-toggle="tooltip" data-placement="top" title="Ebook active"></i></div>
                    <div class="col-3 action">
                        <span class="my-button-red d-none d-sm-inline-block py-0 px-2 deactivate">Deactivate</span>
                        <i class="icon-ban text-danger d-sm-none deactivate" data-toggle="tooltip" data-placement="top" title="ebook deactivated"></i>
                    </div>
                @endif
                <div class="col-1">
                    <a href="{{ route('ebook-edit', ['ebook_id' => $ebook->id]) }}">
                        <i class="icon-pencil" data-toggle="tooltip" data-placement="top" title="edit Ebook"></i>
                    </a>
                </div>
            </div>
        @empty
            <div class="text-center">No record found!</div>
        @endforelse
        {{$ebooks->links()}}
    </div>
@endsection
