$('.cover-image .icon-close').click(function () {
    var id = $('.cover-image').closest('.add-course-wrapper').attr('id');
    myModal(`Confirm cover image deletion<br><small><b>Note: </b>Image will be deleted permanently.</small>`, `deleteCoverImage(${id})`);
});

function deleteCoverImage(id) {
    // console.log(id);
    // return;
    var wrapper = $(`.cover-image`);
    $.ajax({
        url: '/deletecoverimage',
        data: {id:id},
        type: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        beforeSend: function () {
            loader();
        },
        success: function(data){
            // console.log(data);
            successful();
            wrapper.prev('.invalid-feedback').remove();
            wrapper.html('');
        },
        error: function (e) {
            removeLoader();
            insertBeforeError(wrapper, "Delete Action unsuccessful");
        }
    });
    closeModal();
}

// Delete Course materials

$('.course-material .icon-close').click(function () {
    var wrapper = $(this).parent();
    var id = wrapper.attr('id');
    var fileName = wrapper.text().trim();
    myModal(`Confirm deletion of ${fileName}<br><small><b>Note: </b>File will be deleted permanently.</small>`, `deleteMaterial(${id})`);
});

function deleteMaterial(id) {
    var wrapper = $(`.course-material[id=${id}]`);
    $.ajax({
        url: '/deletematerial',
        data: {id:id},
        type: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        beforeSend: function () {
            loader();
        },
        success: function(data){
            // console.log(data);
            successful();
            wrapper.prev('.invalid-feedback').remove();
            wrapper.remove();
        },
        error: function (e) {
            removeLoader();
            insertBeforeError(wrapper, "Delete Action unsuccessful");
        }
    });
    closeModal();
}

// Delete assignment material

$('.assignment-material .icon-close').click(function () {
    var id = $(this).closest('.add-course-wrapper').attr('id');
    var wrapper = $(this).parent();
    var fileName = wrapper.text().trim();
    myModal(`Confirm deletion of ${fileName}<br><small><b>Note: </b>File will be deleted permanently.</small>`, `deleteCourseAssignment(${id})`);
});

function deleteCourseAssignment(id) {
    var wrapper = $(`.assignment-material`);
    $.ajax({
        url: '/deletecourseassignment',
        data: {id:id},
        type: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        beforeSend: function () {
            loader();
        },
        success: function(data){
            successful();
            wrapper.prev('.invalid-feedback').remove();
            wrapper.remove();
        },
        error: function (e) {
            removeLoader();
            insertBeforeError(wrapper, "Delete Action unsuccessful");
        }
    });
    closeModal();
}

//General Update

$('#editCourseForm .submit-addcourse').click(function (e) {
    e.preventDefault();
    var form = $('#editCourseForm');
    var formdata = false;
    formdata = new FormData(form[0]);

    //validate youtube video link
    const videoId = validateYoutubeInput();
    if(!videoId) return;
    if(videoId !== 'empty'){
        formdata.append('video_id', videoId);
    }

    $.ajax({
        url: '/updatecourse',
        data: formdata ? formdata : form.serialize(),
        cache: false,
        contentType: false,
        processData: false,
        type: 'POST',
        success: function (data, textStatus, jqXHR) {
            console.log(data);
            successful();
        },
        beforeSend: function () {
            loader();
        },
        complete: function() {
        },
        error: function (e) {
            removeLoader();
            $('.invalid-feedback').remove();
            var error = e.responseJSON;
            prependInputError($('#addCourseForm'), error.message);
            $.each(error.errors, function (key, value) {
                insertAfterInputError($(`input[name=${key}]`), value);
                if(key === 'business_category'){
                    insertAfterInputError($('.bus-checkbox-wrapper'), value);
                }
                if(key === 'period'){
                    insertAfterInputError($('.period-checkbox-wrapper'), value);
                }
                if(key === 'materials'){
                    insertAfterInputError($('.add-courses-btn'), value);
                }
                if (key === 'action_step_note'){
                    insertAfterInputError($('textarea[name=assignment_note]'), value);
                }
                if(key === 'note'){
                    insertAfterInputError($('textarea[name=note]'), value);
                }
            });
        }
    });

});