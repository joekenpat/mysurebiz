$('#submit-scores').click(function (e) {
    e.preventDefault();
    var form = $('#score-assignment-form');
    var formdata = false;
    formdata = new FormData(form[0]);
    $.ajax({
        url: '/scoreassignment',
        data: formdata ? formdata : form.serialize(),
        cache: false,
        contentType: false,
        processData: false,
        // dataType: "json",
        type: 'POST',
        success: function (data, textStatus, jqXHR) {
            successful();
            console.log(data);
            clearFields("#score-assignment-form");
            location.reload();
        },
        beforeSend: function () {
            loader();
        },
        error: function (e) {
            removeLoader();
            // console.log(e);
            $('.invalid-feedback').remove();
            var error = e.responseJSON;
            prependInputError($('.library.courses > div:nth-child(2)'), error.message);
        }
    });

});