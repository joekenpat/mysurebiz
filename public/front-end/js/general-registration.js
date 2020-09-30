//General Function
//My model confirmation
function myModal(message){
    $('body').prepend(`
        <div class="my-modal w-100 h-100 position-fixed">
            <div class="text-center w-50 position-absolute p-3">
                <div class="text-color-green"><i class="icon-info"></i> ${message} </div>
                <hr>
                <button class="btn btn-dark" onclick="closeModal()">Close</button>
            </div>
        </div>
        `);
}

function closeModal() {
    $('.my-modal').remove();
}

//Ajax Success
function clearFields(formId) {
    $(`${formId} input:not([type=hidden])`).val('');
    $(`${formId} textarea`).val('');
    $(`${formId} input[type=file]`).val('');
    $(`${formId} select`).prop('selectedIndex',0);
    $('#period-info').remove();
    $(`${formId} .profile-img-upload`).attr('src', blankProfilePhoto);
}

// Error function ajax display
function prependInputError(event, message) {
    event.prepend(`
        <span class="invalid-feedback text-center d-block" role="alert">
            <strong>${message}</strong>
        </span>
    `);
}
function insertAfterInputError(event, message) {
    $(`
        <span class="invalid-feedback text-center d-block" role="alert">
            <strong>${message}</strong>
        </span>
    `).insertAfter(event);
}


//Profile Image Updload handle
var coverImageInput = $('input[name=image]');

$('#upload-image').click(function () {
    coverImageInput = $('input[name=image]');
    coverImageInput.click();
    coverImageInput.change(imageChange);
});

function imageChange(){
    if (this.files && this.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.profile-img-upload').attr('src', e.target.result);
        };

        reader.readAsDataURL(this.files[0]);
    }
}

//Date Picker
var datePicker = $( "#datepicker" );
datePicker.datepicker({
    format: 'yyyy-mm-dd'
});
datePicker.datepicker( "option", "minDate", new Date() );
$( ".date-picker" ).datepicker( "option", "minDate", new Date());

//Adding Jquery Validation custom Method
jQuery.validator.addMethod("lettersonly", function(value, element) {
    return this.optional(element) || /^[a-z]+$/i.test(value);
}, "Letters only please");

//Date of birth validation
$.validator.addMethod("birth", function (value, element) {
    var year = value.split('-');
    return parseInt(year[0]) <= 2005;
}, "Under age registration is not allowed!");
//General rules

var generalRules = {
    image: {
        required: false
    },
    first_name: {
        required: true,
        lettersonly: true
    },
    last_name: {
        required: true,
        lettersonly: true
    },
    email: {
        email: true,
        required: true
    },
    password: {
        required: true,
        minlength: 6
    },
    password_confirmation: {
        equalTo: "#password"
    },
    home_address: "required",
    dob: {
        date: true,
        required: true,
        birth: true
    },
    state_of_origin: "required",
    gender: "required",
    phone: {
        required: true,
        digits: true,
        maxlength: 11,
        minlength:11
    },
    resident_state: {
        required: false,
        lettersonly: true
    },
    name_next_of_kin: {
        required: true,
    },
    phone_next_of_kin: {
        required: true,
        digits: true,
        maxlength: 11,
        minlength:11
    },
    state_next_of_kin: {
        required: false,
        lettersonly: true
    },
    business_category: "required",
    business_of_interest: {
        required: false
    },
    period: "required",
    pennywise: "required",
};

var validationRules = Object.assign(specificRules, generalRules);
//Jquery validation proper
$("#Register").validate({
    validClass: "is-valid",
    rules: validationRules,
    messages: {
        password_confirmation: {
            equalTo: "Password does not match."
        }
    },
    submitHandler: function(form) {

        $(form).ajaxSubmit({
            url: regUrl,
            method: 'POST',
            dataType:  'json',
            beforeSend: function () {
                $('#preloader').show();
            },
            complete: function() {
                $('#preloader').hide();
            },
            success: function(data) {
                clearFields('#Register');
                $('.invalid-feedback').remove();
                myModal("Registration was Successful.<br>Kindly check your email for verification message.");
                setTimeout(function () {
                    window.location.replace("https://www.mysurebiz.com");
                }, 3000);
            },
            error: function(data , xhr , err){
                $('.invalid-feedback').remove();

                var response = data.responseJSON;
                prependInputError($('#Register'), response.message);
                console.log(response);
                console.log(data);
                $.each(response.errors, function (key, value) {
                    console.log(key);
                    insertAfterInputError($(`input[name=${key}]`), value);
                })

            }
        });
    }
});

//Select option change
$('select[name=period]').on('change', function() {
    $('#period-info').remove();

    var val = parseInt(this.value/12);
    val = val ? (val > 1 ? val + ' years' : val + ' year') : '' ;

    //Calculate months
    var months = this.value % 12;
    var mVal = months + ' months';
    months = months ? (val !== '' ? ' and ' + mVal : mVal) : '';

    val = val + months;
    $(`
        <small id="period-info" class="text-success">You have a period of ${val} in the system.</small>
    `).insertAfter('select[name=period]');

});

$(function () {
    $('label > i.icon-question[data-toggle="tooltip"]').tooltip();
});

