var coverImageInput = $('#coverImageInput');

//My model confirmation
function myModal(message, actionMethod){
    $('.content-wrapper').prepend(`
        <div class="my-modal w-100 h-100 position-fixed">
            <div class="text-center w-50 position-absolute p-3">
                <div><i class="icon-info"></i> ${message} </div>
                <hr>
                <button class="my-button-red" onclick="closeModal()">Cancel</button>
                <button class="my-button-green ml-2" onclick=${actionMethod}>Confirm</button>
            </div>
        </div>
        `);
}

function closeModal() {
    $('.my-modal').remove();
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

function insertBeforeError(event, message) {
    $(`
        <span class="invalid-feedback text-center d-block" role="alert">
            <strong>${message}</strong>
        </span>
    `).insertBefore(event);
}

function validateYoutubeInput() {
    const videoInput = $('input[name=video]');
    const url = videoInput.val();
    if (url !== undefined && url !== ''){
        const videoId = validateYouTubeUrl(url);
        if(!videoId){
            insertAfterInputError(videoInput , 'Youtube video link is invalid.');
            return false;
        }
        return videoId;
    }
    return 'empty';
}
function validateYouTubeUrl(url)
{
    var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=|\?v=)([^#\&\?]*).*/;
    var match = url.match(regExp);
    return match && match[2].length === 11 ? match[2] : false;
}

//Ajax loader
function loader(){
    $('.content-wrapper').prepend(`
                <div class="loader w-100 h-100 position-fixed">
                    <div class="spinner"></div>
                    <div class="spinner"></div>
                    <div class="spinner"></div>
                </div>
                `);
}
function removeLoader(){
    $('.loader').remove();
}
//Ajax Success
function successful() {
    $('.invalid-feedback').remove();
    removeLoader();
    $('.content-wrapper').prepend(`
                <div class="successful">Successful</div>
                `);
    var mytime = setTimeout(function () {
        removeSuccessful();
        clearTimeout(mytime);
    }, 4000);
}
function removeSuccessful() {
    $('.successful').remove();
}
function clearFields(formId) {
    $(`${formId} input:not([type=hidden]):not([type=checkbox])`).val('');
    $('input[type=checkbox]').prop('checked',false);
    $(`${formId} textarea`).val('');
    $(`${formId} .course-material`).remove();
    $(`${formId} input[type=file]`).val('');
    $(`${formId} select`).prop('selectedIndex',0);
    $(`${formId} .cover-image`).html('');
}
//close image window
function closePreviewWrapper(event, course = false){
    var previewWrapper = event.parent();
    previewWrapper.addClass('remove-effect');

    var myTime = setTimeout( function(){
        clearTimeout(myTime);
        if(course){
            previewWrapper.remove();

        }else{
            previewWrapper.html('');
            previewWrapper.removeClass('remove-effect');
            coverImageInput.val("");
        }

    },600);

}

//close Course Material window
function closeCourseMaterial(event){
    var previewWrapper = event.parent();
    previewWrapper.addClass('remove-effect');

    var myTime = setTimeout( function(){
        clearTimeout(myTime);
        previewWrapper.remove();
    },600);

}

//preview post image
coverImageInput.change(function(){
    var coverImageWrapper = $('.cover-image');
    coverImageWrapper.html('');
    coverImageWrapper.append( '<i class="icon-close position-absolute" onclick="closePreviewWrapper($(this))" data-toggle="tooltip" data-placement="top" title="delete image"></i>' );
    coverImageWrapper.append('<img class="img-fluid" alt="">');
    //add image url
    if (this.files && this.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.cover-image img').attr('src', e.target.result);
        };

        reader.readAsDataURL(this.files[0]);
    }
});

//Add Course Materials
function addCourseMaterial(event){
    var mainWrapper = event.parent().removeClass('d-none');
    // check if file was chosen
    if (event[0].files && event[0].files[0]) {
        console.log("Ok");
        mainWrapper.append('<i class="icon-close position-absolute" onclick="closeCourseMaterial($(this))" data-toggle="tooltip" data-placement="top" title="delete file"></i>');
        mainWrapper.append(event[0].files[0].name);
    }else{
        mainWrapper.remove();
    }
}

var addButton = $('.add-courses-btn');

addButton.click(function (e) {
    e.preventDefault();
    var courseMatInputs = $('.course-material input');
    var isInput = false;
    // courseMatInputs[2].files.length
    if(courseMatInputs){
    $.each(courseMatInputs, function (key, value) {
        if(!value.files.length){
            isInput = true;
            value.click();
            return false;
        }
    });
    }
    if(isInput){
        return;
    }

    var materialCount = $('.course-material').length;
    addButton.parent().append(`
            <div class="course-material course${materialCount} d-none course mt-2 position-relative">
            <input name="materials[]" type="file" onchange="addCourseMaterial($(this))" class="d-none">                    
            </div>
            `).find(`.course${materialCount} input`).click();
});

//Upload Assignment
$('.upload-assigmment').click(function (e) {
    e.preventDefault();
    $(this).parent().find('input').click();
});

function AddLessonAssignmentChange(event){
    // Check if any file was chosen
    if (event[0].files && event[0].files[0]) {
        event.parent().find('.course-material').remove();
        event.parent().append(`
        <div class="course-material mt-2 position-relative">
        <i class="icon-close position-absolute" onclick="closeCourseMaterial($(this))" data-toggle="tooltip" data-placement="top" title="delete assignment"></i>
        ${event[0].files[0].name}</div>`);
    }
}
//upload Cover Image
$('.upload-cover-image').click(function (e) {
    $('#coverImageInput').click();
    e.preventDefault();
});

//Courses page. Change + to - onclick
var collapse = $('.lessons-wrapper');
collapse.on('show.bs.collapse', function () {
    console.log("ok");
    $(this).prev().find('.sign-wrapper').html('-');
});
collapse.on('hidden.bs.collapse', function () {
    $(this).prev().find('.sign-wrapper').html('+');
});

// Active Link color change
if(location.href !== location.href.split('keeptoken')[0] + "keeptoken")
{
    $('nav .navbar-nav > li > a[href="' + location.href + '"]').parent().addClass('green-button-active');
}


$(function () {
    $('[data-toggle="tooltip"]').tooltip();
});
