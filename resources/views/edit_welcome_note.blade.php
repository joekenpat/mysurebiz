@extends('layouts.template')
@section('title', 'Edit Welcome Note')
@section('extraCss')
    <link href="{{ asset('css/addcourse.css') }}" rel="stylesheet"/>
    <link href="https://cdn.quilljs.com/1.0.0/quill.snow.css" rel="stylesheet">
    <link href="{{ asset('css/sendemail.css') }}" rel="stylesheet"/>
@endsection
@section('extraScript')
    <script>
        var postUrl = '{{ route('edit-welcome-note') }}';
        var editor_content = "{{$welcome_note->content}}";
    </script>
    {{--<script src="https://cdn.quilljs.com/1.0.0/quill.js"></script>--}}
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
    <script src="{{ asset('js/quill_editor_config.js') }}" defer></script>
    <script src="{{ asset('js/edit_welcome_note.js') }}"></script>

@endsection
@section('content')
    <div class="row">
        <div class="add-course-wrapper offset-md-2 col-12 col-md-8 pt-5 pl-5 pr-5 pb-2">
            <h3><i class="icon-pencil"></i> Welcome Note</h3>
            <form id="addCourseForm">
                @csrf
                <div class="form-group row" id="welcome-note-wrapper">
                    <div class="col-12 my-editor">
                        <!-- Create the toolbar container -->
                        <div id="toolbar"></div>
                        <!-- Create the editor container -->
                        <div id="editor"></div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-12">
                        <input type="text" class="form-control" name="video"
                               placeholder="Welcome video link" value="{{$welcome_note->video}}"
                        >
                        <small class="text-muted centered">Please insert a valid youtube video link. <br>e.g. https://www.youtube.com/watch?v=_Z-0cwONN6c</small>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-12">
                        <a href="{{ route('welcome_note') }}" class="my-button-gray submit-addcourse float-left">View</a>
                        <button type="submit" class="my-button-green submit-addcourse float-right cursor-pointer">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection