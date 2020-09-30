$('#addCourseForm .submit-addcourse').click(function (e) {
    e.preventDefault();
    var form = $('#addCourseForm');
    var formdata = false;
    formdata = new FormData(form[0]);
    $.ajax({
        url: batchUrl,
        data: formdata ? formdata : form.serialize(),
        cache: false,
        contentType: false,
        processData: false,
        type: 'POST',
        success: function (res) {
            successful();
            if(isEdit === "") clearFields("#addCourseForm");
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
            });
        }
    });

});

