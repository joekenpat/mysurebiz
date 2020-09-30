<div class="row">
    <div class="add-course-wrapper offset-md-2 col-12 col-md-8 pt-5 pl-5 pr-5 pb-2">
        <h3><i class="icon-book-open"></i> {{$title}} Batch</h3>
        <form id="addCourseForm" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">
                    Name <small class="text-success">*</small>
                </label>
                <div class="col-sm-10">
                    <input type="text" value="{{$name}}" class="form-control" name="name" placeholder="Name of batch">
                </div>
            </div>

            <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Start
                    <span class="no-white-space">
                        date <small class="text-success">*</small>
                    </span>
                </label>
                <div class="col-sm-10">
                    <input placeholder="yyyy-mm-dd" value="{{$start_date}}" type="text" class="form-control" name="start_date">
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