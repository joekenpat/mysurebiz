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
            console.log(e.responseJSON);
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
        url: '/deletelessonassignment',
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
            console.log(e.responseJSON);
            removeLoader();
            insertBeforeError(wrapper, "Delete Action unsuccessful");
        }
    });
    closeModal();
}

//General Update

$('#editLessonForm .submit-addcourse').click(function (e) {
    e.preventDefault();
    var form = $('#editLessonForm');
    var formdata = false;
    formdata = new FormData(form[0]);

    //validate youtube video link
    const videoId = validateYoutubeInput();
    if(!videoId) return;
    if(videoId !== 'empty'){
        formdata.append('video_id', videoId);
    }

    $.ajax({
        url: '/updatelesson',
        data: formdata ? formdata : form.serialize(),
        cache: false,
        contentType: false,
        processData: false,
        // dataType: "json",
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
            console.log(error);
            prependInputError($('#editCourseForm'), error.message);
            $.each(error.errors, function (key, value) {
                insertAfterInputError($(`input[name=${key}]`), value);
            if(error.errors['cover_image']){
                insertAfterInputError($('.upload-cover-image'), error.errors['cover_image']);
            }
            if(error.errors['materials']){
                insertAfterInputError($('.add-courses-btn'), error.errors['materials']);
            }
            if(error.errors['assignment_file']){
                insertAfterInputError($('.upload-assigmment'), error.errors['assignment_file']);
            }
            if(error.errors['note']){
                insertAfterInputError($('textarea[name=note]'), error.errors['note']);
            }
            });
            console.log(error);
        }
    });

});