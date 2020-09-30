$('#addLessonForm .submit-addcourse').click(function (e) {
    e.preventDefault();
    var form = $('#addLessonForm');
    var formdata = false;
    formdata = new FormData(form[0]);

    //validate youtube video link
    const videoId = validateYoutubeInput();
    if(!videoId) return;
    if(videoId !== 'empty'){
        formdata.append('video_id', videoId);
    }

    $.ajax({
        url: '/createlesson',
        data: formdata ? formdata : form.serialize(),
        cache: false,
        contentType: false,
        processData: false,
        type: 'POST',
        success: function () {
            successful();
            clearFields("#addLessonForm");
        },
        beforeSend: function () {
            loader();
        },
        error: function (e) {
            removeLoader();
            $('.invalid-feedback').remove();
            var error = e.responseJSON;
            prependInputError($('#addLessonForm'), error.message);
            $.each(error.errors, function (key, value) {
                insertAfterInputError($(`input[name=${key}]`), value);
                if(key === 'cover_image'){
                    insertAfterInputError($('.upload-cover-image'), value);
                }
                if(key === 'materials'){
                    insertAfterInputError($('.add-courses-btn'), value);
                }
                if(key === 'assignment_file'){
                    insertAfterInputError($('.upload-assigmment'), value);
                }
                if(key === 'note'){
                    insertAfterInputError($('textarea[name=note]'), value);
                }
            });
        }
    });

});