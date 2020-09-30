$('#addLessonForm .submit-addcourse').click(function (e) {
    e.preventDefault();
    var form = $('#addLessonForm');
    var formdata = false;
    formdata = new FormData(form[0]);

    $.ajax({
        url: url,
        data: formdata ? formdata : form.serialize(),
        cache: false,
        contentType: false,
        processData: false,
        type: 'POST',
        success: function () {
            successful();
            // clearFields("#addLessonForm");
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
                if(key === 'ebook'){
                    insertAfterInputError($('.upload-assigmment'), value);
                }
                if(key === 'description'){
                    insertAfterInputError($('textarea[name=note]'), value);
                }
            });
        }
    });

});