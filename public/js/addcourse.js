$('#addCourseForm .submit-addcourse').click(function (e) {
    e.preventDefault();
        var form = $('#addCourseForm');
        var formdata = false;
        formdata = new FormData(form[0]);

        //validate youtube video link
        const videoId = validateYoutubeInput();
        if(!videoId) return;
        if(videoId !== 'empty'){
            formdata.append('video_id', videoId);
        }

        $.ajax({
            url: '/createcourse',
            data: formdata ? formdata : form.serialize(),
            cache: false,
            contentType: false,
            processData: false,
            type: 'POST',
            success: function () {
                successful();
                clearFields("#addCourseForm");
            },
            beforeSend: function () {
                loader();
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

