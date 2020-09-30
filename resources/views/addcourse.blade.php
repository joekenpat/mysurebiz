@extends('layouts.template')
@section('title', 'Add Course')
@section('extraCss')
    <link href="{{ asset('css/addcourse.css') }}" rel="stylesheet"/>
@endsection
@section('extraScript')
    <script src="{{ asset('js/addcourse.js') }}"></script>
    <script src="{{ asset('js/datepicker.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
@endsection
@section('content')
    <div class="row">
    <div class="add-course-wrapper offset-md-2 col-12 col-md-8 pt-5 pl-5 pr-5 pb-2">
        <h3><i class="icon-book-open"></i> Add Training</h3>
        <form id="addCourseForm" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Training
                    <span class="no-white-space">
                        Title <small class="text-success">*</small>
                    </span>
                </label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="title" placeholder="Training Title">
                </div>
            </div>
            <div class="form-group row">
                <label for="exampleFormControlSelect1" class="col-12 col-sm-2 col-form-label">Business
                    <span class="no-white-space">
                        Category <small class="text-success">*</small>
                    </span>
                </label>
                <div class="col-12 col-sm-10 col-form-label text-color-green">
                    <div class="row my-check-box-parent bus-checkbox-wrapper">
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
                <label for="exampleFormControlSelect1" class="col-12 col-sm-2 col-form-label">
                    Period <small class="text-success">*</small>
                </label>
                <div class="col-12 col-sm-10 col-form-label text-color-green">
                    <div class="row my-check-box-parent period-checkbox-wrapper">
                        @foreach($period as $p)
                            <div class="col-12 col-sm-6 mt-2">
                                <span>
                                    <input type="checkbox" name="period[]" value="{{ $p }}"> {{ $p }} Months
                                </span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>


            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Start
                    <span class="no-white-space">
                        date <small class="text-success">*</small>
                    </span>
                </label>
                <div class="col-sm-10">
                    <input placeholder="yyyy-mm-dd" type="text" class="form-control" name="start_date">
                </div>
            </div>
            <div class="form-group row">
                <label for="exampleFormControlTextarea1" class="col-sm-2 col-form-label">Introductory Note</label>
                <div class="col-sm-10">
                <textarea class="form-control" name="note" rows="8" placeholder="Write Introductory Note..."></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="exampleFormControlTextarea1" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10 text-center">
                    <input type="file" id="coverImageInput" name="cover_image" class="d-none" accept="image/*">
                    <button class="btn btn-success upload-cover-image"><i class="icon-cloud-upload"></i> Upload Cover Image</button>
                    <div class="cover-image mt-2 position-relative">
                    </div>
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Video Link</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="video" placeholder="Introductory Video Link">
                    <small class="text-muted centered">Please insert a valid youtube video link. <br>e.g. https://www.youtube.com/watch?v=_Z-0cwONN6c</small>
                </div>
            </div>

            <div class="form-group row">
                <label for="exampleFormControlTextarea1" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10 text-center">
                    <button class="btn btn-success add-courses-btn"><i class="icon-plus"></i> Add Training Materials</button>
                </div>
            </div>

            <div class="form-group row">
                <label for="exampleFormControlTextarea1" class="col-sm-2 col-form-label">Final Action Step</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="action_step_note" rows="8" placeholder="Write final Action Step for this training..."></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="exampleFormControlTextarea1" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10 text-center">
                    <input type="file" id="LessonAssignment" name="action_step_file" onchange="AddLessonAssignmentChange($(this))" class="d-none">
                    <button class="btn btn-success upload-assigmment"><i class="icon-cloud-upload"></i> Upload action step<span class="d-sm-inline d-none"> Document</span></button>
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