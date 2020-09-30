@extends('layouts.template')
@section('title', 'Add Lesson')
@section('extraScript')
    <script src="{{ asset('js/ebook.js') }}"></script>
@endsection
@section('content')
    <div class="row">
        <div class="add-course-wrapper offset-md-2 col-12 col-md-8 pt-5 pl-5 pr-5 pb-2">
            <h3><i class="icon-book-open"></i> Ebook</h3>
            <form id="addLessonForm" method="post" action="/admin/ebooks/create"
                  enctype="multipart/form-data">
                @csrf
                @if(session()->has('message'))
                    <div class="alert alert-success text-center">
                        {{ session()->get('message') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        There were some errors with your request.
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" required
                               name="title" placeholder="Lesson Title">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="exampleFormControlSelect1" class="col-12 col-sm-2 col-form-label">
                        <span class="no-white-space">
                        Audience <small class="text-success">*</small>
                    </span>
                    </label>
                    <div class="col-12 col-sm-10 col-form-label text-color-green">
                        <div class="row my-check-box-parent bus-checkbox-wrapper">
                            <div class="col-12 col-sm-6 mt-2">
                                <span>
                                    <input type="checkbox" name="non_users"
                                           value="1"> Non Users
                                </span>
                            </div>

                            <div class="col-12 col-sm-6 mt-2">
                                <span>
                                    <input type="checkbox" name="users"
                                           value="1"> Users
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="exampleFormControlTextarea1" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10 text-center">
                        <input type="file" id="coverImageInput" name="ebook_cover_image" class="d-none"
                               accept="image/*">
                        <button class="btn btn-success upload-cover-image"><i class="icon-cloud-upload"></i> Upload
                            Cover Image
                        </button>
                        <div class="cover-image mt-2 position-relative">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Price</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" name=price
                               placeholder="Price of ebook" required>
                        <small class="text-muted centered">This is the price you wish to sell your ebook. e.g. 100 =
                            &#8358;100.
                        </small>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="exampleFormControlTextarea1" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-10">
                        <textarea required class="form-control" name="description" rows="8"
                                  placeholder="Write description of ebook..."></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="exampleFormControlTextarea1" class="col-sm-2 col-form-label"></label>
                    <div class="col-sm-10 text-center">
                        <input type="file" required name="ebook" onchange="AddLessonAssignmentChange($(this))"
                               class="d-none">
                        <button class="btn btn-success upload-assigmment"><i class="icon-cloud-upload"></i> Upload Ebook
                        </button>
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