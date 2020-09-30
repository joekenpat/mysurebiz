$('#addLibraryForm .submit-addcourse').click(function (e) {
    e.preventDefault();
    var form = $('#addLibraryForm');
    var formdata = false;
    formdata = new FormData(form[0]);
    // var formAction = form.attr('action');
    $.ajax({
        url: '/createlibrary',
        data: formdata ? formdata : form.serialize(),
        cache: false,
        contentType: false,
        processData: false,
        // dataType: "json",
        type: 'POST',
        success: function (data, textStatus, jqXHR) {
            successful();
            clearFields("#addLibraryForm");
        },
        beforeSend: function () {
            loader();
        },
        error: function (e) {
            removeLoader();
            $('.invalid-feedback').remove();
            var error = e.responseJSON;
            console.log(error);
            prependInputError($('#addLessonForm'), error.message);
            if(error.errors['business_category']){
                insertAfterInputError($('.my-check-box-parent'), error.errors['business_category']);
            }
            if(error.errors['materials']){
                insertAfterInputError($('.add-courses-btn'), error.errors['materials']);
            }
            // console.log(error);
        }
    });

});