@extends('layouts.template')
@section('title', 'Add Lesson')
@section('extraScript')
    <script src="{{ asset('js/addlesson.js') }}"></script>
@endsection
@section('content')
    <div class="row">
        <div class="add-course-wrapper offset-md-2 col-12 col-md-8 pt-5 pl-5 pr-5 pb-2">
            <h3><i class="icon-book-open"></i> Lesson</h3>
            <form id="addLessonForm" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="title" placeholder="Lesson Title">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Training</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="course">
                            <option disabled selected>Choose Training...</option>
                            @foreach($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Video Link</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="video" placeholder="Lesson Video Link">
                        <small class="text-muted centered">Please insert a valid youtube video link. <br>e.g. https://www.youtube.com/watch?v=_Z-0cwONN6c</small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleFormControlTextarea1" class="col-sm-2 col-form-label">Lesson Note</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="note" rows="8" placeholder="Write note for this lesson..."></textarea>
                    </div>
                </div>

                {{--<div class="form-group row">--}}
                    {{--<label for="exampleFormControlSelect1" class="col-sm-2 col-form-label">Duration</label>--}}
                    {{--<div class="col-5">--}}
                        {{--<input type="number" class="form-control" id="inputEmail3" placeholder="Duration">--}}
                    {{--</div>--}}
                    {{--<div class="col-5">--}}
                        {{--<select class="form-control" id="exampleFormControlSelect1">--}}
                            {{--<option>day(s)</option>--}}
                            {{--<option>week(s)</option>--}}
                            {{--<option>Month(s)</option>--}}
                        {{--</select>--}}
                    {{--</div>--}}
                {{--</div>--}}

                <div class="form-group row">
                    <label for="exampleFormControlTextarea1" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10 text-center">
                        <button class="btn btn-success add-courses-btn"><i class="icon-plus"></i> Add Lesson Materials</button>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleFormControlTextarea1" class="col-sm-2 col-form-label">Action Step</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="action_step_note" rows="8" placeholder="Write action step note for this lesson..."></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleFormControlTextarea1" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10 text-center">
                        <input type="file" name="action_step_file" onchange="AddLessonAssignmentChange($(this))" class="d-none">
                        <button class="btn btn-success upload-assigmment"><i class="icon-cloud-upload"></i> Upload Action Step Document</button>
                        <div class="course-material mt-2 position-relative d-none">

                        </div>
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