@extends('layouts.template')
@section('title', 'Add Lesson')
@section('extraScript')
    <script src="{{ asset('js/addlibrary.js') }}"></script>
@endsection
@section('content')
    <div class="row">
        <div class="add-course-wrapper offset-md-2 col-12 col-md-8 pt-5 pl-5 pr-5 pb-2">
            <h3><i class="icon-docs"></i> Library</h3>
            <form id="addLibraryForm" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <label for="exampleFormControlSelect1" class="col-12 col-sm-2 col-form-label">Business
                        <span class="no-white-space">
                        Category <small class="text-success">*</small>
                    </span>
                    </label>
                    <div class="col-12 col-sm-10 col-form-label text-color-green">
                        <div class="row my-check-box-parent">
                            @foreach($businessCategories as $businessCategory)
                                <div class="col-12 col-sm-6 mt-2">
                                <span>
                                    <input type="checkbox" name="business_category[]" value="{{ $businessCategory->id }}"> {{ $businessCategory->name }}
                                </span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-12 text-center">
                        <button class="btn btn-success add-courses-btn"><i class="icon-plus"></i> Add Library Materials</button>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10 text-right">
                        <button type="submit" class="btn btn-primary submit-addcourse">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection