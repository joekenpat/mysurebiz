@extends('layouts.template')
@section('title', 'Edit Course')
@section('extraScript')
    <script src="{{ asset('js/editcourse.js') }}"></script>
    <script src="{{ asset('js/datepicker.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
@endsection
@section('content')
    <div class="row">
        <div class="add-course-wrapper offset-md-2 col-12 col-md-8 pt-5 pl-5 pr-5 pb-2" id="{{ $courses->id }}">
            <h3><i class="icon-pencil"></i> Edit Training</h3>
            <form id="editCourseForm" enctype="multipart/form-data">
                <input type="text" name="id" value="{{ $courses->id }}" class="d-none">
                @csrf
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Training Title <span class="text-success d-inline-block">*</span></label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" value="{{ $courses->title }}" name="title" placeholder="Training Title">
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
                                @php
                                    $Category = $business_categories
                                    ->where('business_category_id', $businessCategory->id);
                                    $isChecked = (!$Category->isEmpty())?"checked":"";
                                @endphp
                                <div class="col-12 col-sm-6 mt-2">
                                    <span>
                                        <input type="checkbox" {{ $isChecked }} name="business_category[]" value="{{ $businessCategory->id }}"> {{ $businessCategory->name }}
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
                                @php
                                    $isCoursePeriod = $coursePeriod->where('period', $p);
                                    $isChecked = (!$isCoursePeriod->isEmpty())?"checked":"";
                                @endphp
                                <div class="col-12 col-sm-6 mt-2">
                                <span>
                                    <input type="checkbox" {{ $isChecked }} name="period[]" value="{{ $p }}"> {{ $p }} Months
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
                        <input value="{{ $courses->start_date }}" type="text" class="form-control" name="start_date">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="exampleFormControlTextarea1" class="col-sm-2 col-form-label">Introductory Note</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="note" rows="8" placeholder="Write Introductory Note...">{{ $courses->note }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleFormControlTextarea1" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10 text-center">
                        <input type="file" id="coverImageInput" name="cover_image" class="d-none">
                        <button class="btn btn-success upload-cover-image"><i class="icon-cloud-upload"></i> Upload Cover Image</button>
                        <div class="cover-image mt-2 position-relative">
                            <i class="icon-close position-absolute" data-toggle="tooltip" data-placement="top" title="delete image"></i>
                            <img src="/storage/{{ $courses->cover_image }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Video Link</label>
                    <div class="col-sm-10">
                        <input type="text" value="{{ $courses->video }}" class="form-control" name="video" placeholder="Introductory Video Link">
                        <small class="text-muted centered">Please insert a valid youtube video link. <br>e.g. https://www.youtube.com/watch?v=_Z-0cwONN6c</small>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="exampleFormControlTextarea1" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10 text-center">
                        <button class="btn btn-success add-courses-btn"><i class="icon-plus"></i> Add Training Materials</button>
                        @forelse($libraries as $library)
                            @php
                                $fileName = explode('/', $library->file)[1];
                            @endphp
                            <div class="course-material course0 course mt-2 position-relative" id="{{ $library->id }}">
                                <i class="icon-close position-absolute" data-toggle="tooltip" data-placement="top" title="delete file"></i>{{ $fileName }}
                            </div>
                        @empty
                        @endforelse
                    </div>
                </div>

                <div class="form-group row">
                    <label for="exampleFormControlTextarea1" class="col-sm-2 col-form-label">Final Action Step</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="action_step_note" rows="8" placeholder="Write assignment note for this lesson...">{{ $courses->assignment_note }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleFormControlTextarea1" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10 text-center">
                        <input type="file" id="LessonAssignment" name="action_step_file" onchange="AddLessonAssignmentChange($(this))" class="d-none">
                        <button class="btn btn-success upload-assigmment"><i class="icon-cloud-upload"></i> Upload Action Step Document</button>
                        @if($courses->assignment_doc)
                        @php
                            $assignmentName = explode('/', $courses->assignment_doc)[1];
                        @endphp
                        <div class="assignment-material mt-2 position-relative">
                            <i class="icon-close position-absolute" data-toggle="tooltip" data-placement="top" title="delete assignment"></i>
                        {{ $assignmentName }}
                        </div>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10 text-right">
                        <button type="submit" class="btn btn-primary submit-addcourse">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection