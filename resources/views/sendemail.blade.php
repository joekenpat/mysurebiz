@extends('layouts.template')
@section('title', 'Send Email')
@section('extraCss')
    <link href="{{ asset('css/addcourse.css') }}" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
    <link href="https://cdn.quilljs.com/1.0.0/quill.snow.css" rel="stylesheet">
    <link href="{{ asset('css/sendemail.css') }}" rel="stylesheet"/>
@endsection
@section('extraScript')
    <script>
        var postUrl = '{{ route('sendemail') }}';
        var editor_content = null;
    </script>
    <script src="https://cdn.quilljs.com/1.0.0/quill.js"></script>
    <script src="{{ asset('js/quill_editor_config.js') }}"></script>
    <script src="{{ asset('js/sendemail.js') }}"></script>
    <script src="{{ asset('js/datepicker.js') }}"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>

@endsection
@section('content')
    <div class="row">
        <div class="add-course-wrapper offset-md-2 col-12 col-md-8 pt-5 pl-5 pr-5 pb-2">
            <h3><i class="icon-envelope"></i> Send Email</h3>
            <form id="addCourseForm" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">
                        <span class="no-white-space">
                            Subject <small class="text-success">*</small>
                        </span>
                    </label>
                    <div class="col-sm-10">
                        <input type="text" required class="form-control" name="subject" placeholder="Subject of Email">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleFormControlSelect1" class="col-12 col-sm-2 col-form-label">Business
                        <span class="no-white-space">
                        Category <small class="text-success">*</small>
                    </span>
                    </label>
                    <div class="col-12 col-sm-10 col-form-label text-color-green">
                        <div class="row my-check-box-parent">
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
                    <label for="editor" class="col-sm-2 col-form-label">Content</label>
                    <div class="col-sm-10 my-editor">
                        <!-- Create the toolbar container -->
                        <div id="toolbar"></div>
                        <!-- Create the editor container -->
                        <div id="editor"></div>
                    </div>
                </div>


                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Send
                        <span class="no-white-space">
                        date <small class="text-success">*</small>
                    </span>
                    </label>
                    <div class="col-sm-10">
                        <input placeholder="yyyy-mm-dd" required type="text" class="form-control" name="start_date">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="exampleFormControlTextarea1" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10 text-center">
                        <button class="btn btn-success add-courses-btn"><i class="icon-plus"></i> Email Attachement</button>
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