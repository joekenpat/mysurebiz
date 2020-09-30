
$('#addCourseForm').submit(function (e) {
    e.preventDefault();
    var invalideFeedback = $('.invalid-feedback');
    invalideFeedback.remove();
    /*
    Validation
     */
    if($('input[type=checkbox]:checked').length < 1){
        insertAfterInputError($('.my-check-box-parent'), "Period is required!");
        return;
    }

    //validate editor
    var editor = $('#editor');
    var editor_content = quill.container.firstChild.innerHTML;
    if(editor_content.length < 12){
        insertAfterInputError(editor, "Content must not be empty!");
        return;
    }
    /*
    Validation ends here
     */
    var form = $('#addCourseForm');
    var formdata = false;
    formdata = new FormData(form[0]);
    formdata.append('mailcontent', editor_content);

    // Inspect the key/value pairs
    // for (var pair of formdata.entries()) {
    //     console.log(pair[0]+ ', ' + pair[1]);
    // }

    $.ajax({
        url: postUrl,
        data: formdata ? formdata : form.serialize(),
        cache: false,
        contentType: false,
        processData: false,
        type: 'POST',
        success: function (data) {
            console.log(data);
            successful();
            clearFields("#addCourseForm");
        },
        beforeSend: function () {
            loader();
        },
        error: function (e) {
            removeLoader();
            invalideFeedback.remove();
            var error = e.responseJSON;
            prependInputError($('#addCourseForm'), error.message);
            $.each(error.errors, function (key, value) {
                insertAfterInputError($(`input[name=${key}]`), value);
                if(key === 'period'){
                    insertAfterInputError($('.my-check-box-parent'), value);
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