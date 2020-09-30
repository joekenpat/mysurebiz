$('#addCourseForm').submit(function (e) {
    e.preventDefault();
//validate editor
    var editor = $('#editor');
    var editor_content = quill.container.firstChild.innerHTML;
    if (editor_content.length < 12) {
        insertAfterInputError(editor, "Content must not be empty!");
        return;
    }

    //validate youtube video link
    const videoId = validateYoutubeInput();
    if(!videoId) return;

    var form = $('#addCourseForm');
    var formdata = false;
    formdata = new FormData(form[0]);
    if(videoId !== 'empty'){
        formdata.append('video_id', videoId);
    }
    /*
    Validation ends here
     */
    formdata.append('welcome_note', editor_content);

    $.ajax({
        url: postUrl,
        data: formdata ? formdata : form.serialize(),
        cache: false,
        contentType: false,
        processData: false,
        type: 'POST',
        success: function (data) {
            successful();
        },
        beforeSend: function () {
            loader();
        },
        error: function (e) {
            removeLoader();
            var error = e.responseJSON;
            prependInputError($('#addCourseForm'), error.message);
            $.each(error.errors, function (key, value) {
                if (key === 'welcome_note') {
                    insertAfterInputError($('#editor'), value);
                }
            });
        }
    });
});