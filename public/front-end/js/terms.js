
var submitButton = $('button[type=submit]');
var termCheck = $('#term-check');
var termsWrapper = $('.terms-wrapper');
var termText = $('#term-text');

$('#term-reject').click(function () {
    termCheck.prop('checked', false);
    termsWrapper.hide();
    termReject();
});

$('#term-accept').click(function () {
    termCheck.prop('checked', true);
    termsWrapper.hide();
    termChecked();
});

function loadTerms(){
    $.ajax({
        url: "https://www.mysurebiz.com/wp-json/wp/v2/pages/80",
        beforeSend: function () {
            $('#preloader').show();
        },
        complete: function() {
            $('#preloader').hide();
        },
        success: function (data) {
            myresult = data.content['rendered'];
            console.log(myresult);
            termText.html(myresult);
            termsWrapper.show();
        },
        dataType: 'json'
    });
}

$('#read-terms').click(function (e) {
    if(termText.is(':empty')) loadTerms();
    else termsWrapper.show();
    e.preventDefault();
    return false;
});

termCheck.click(function () {
    if(termCheck.prop('checked')) termChecked();
    else termReject();
});

function termReject() {
    submitButton.removeClass('btn-success');
    submitButton.addClass('btn-default');
    submitButton.prop('disabled', true);
}

function termChecked() {
    submitButton.removeClass('btn-default');
    submitButton.addClass('btn-success');
    submitButton.prop('disabled', false);
}
