//upload Cover Image
// console.log('loaded');
$('.upload-lesson-assignment').click(function (e) {
    e.preventDefault();
    $(this).parent().find('input').click();
});

function UserAddLessonAssignmentChange(event){
    // Check if any file was chosen
    if (event[0].files && event[0].files[0]) {
        event.parent().find('.course-material').remove();

        $(`<div class="course-material w-50 mx-auto mt-2 position-relative">
        <i class="icon-close position-absolute" onclick="closeCourseMaterial($(this))" data-toggle="tooltip" data-placement="top" title="delete assignment"></i>
        ${event[0].files[0].name}</div>`).insertAfter('.upload-lesson-assignment');
    }
}

//Submit Assignment
$('#submitassignment button[type=submit]').click(function (e) {
    e.preventDefault();
    var form = $('#submitassignment');
    var formdata = false;
    formdata = new FormData(form[0]);
    // var formAction = form.attr('action');
    $.ajax({
        url: '/submitassignment/lesson/'+lessonId,
        data: formdata ? formdata : form.serialize(),
        cache: false,
        contentType: false,
        processData: false,
        // dataType: "json",
        type: 'POST',
        success: function (data, textStatus, jqXHR) {
            // console.log(data);
            successful();
            clearFields("#submitassignment");
            $(`
            <div class="assignment-submitted text-center">
                <div class="d-inline-block p-1 text-color-green"><i class="icon-check"></i> Assignment Submitted Successfully</div>
            </div>
            `).insertAfter('#submitassignment');
            $('#submitassignment').remove();
        },
        beforeSend: function () {
            loader();
        },
        error: function (e) {
            removeLoader();
            $('.invalid-feedback').remove();
            var error = e.responseJSON;
            insertAfterInputError($('input[type=file]'), error.message);
            if(error.errors['assignment']){
                insertAfterInputError($('.upload-lesson-assignment'), error.errors['assignment']);
            }
            // console.log(error);
        }
    });

});
