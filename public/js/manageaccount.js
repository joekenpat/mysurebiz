$('.manage-account .icon-trash').click(function () {
    var parentWrapper = $(this).closest('.course-wrapper');
    var user = parentWrapper.find('.user-email').text();
    var id = parentWrapper.attr('id');
    myModal(`Confirm deletion of user <span>${user}</span><br><small><b>Note: </b>User will be deleted permanently.</small>`, `deleteuser(${id})`);
});

function deleteuser(id) {
    var wrapper = $(`.course-wrapper[id=${id}]`);
    $.ajax({
        url: '/deleteuser',
        data: {id:id},
        type: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        beforeSend: function () {
            loader();
        },
        success: function(data){
            // console.log(data);
            successful();
            wrapper.prev('.invalid-feedback').remove();
            wrapper.next('.lessons-wrapper').remove();
            wrapper.remove();
        },
        error: function (e) {
            console.log(e.responseJSON);
            removeLoader();
            insertBeforeError(wrapper, "Delete Action unsuccessful");
        }
    });
    closeModal();
}

//Update user Status


// onclick event
$('.manage-account').on('click', '.deactivate, .reactivate',  function() {
    var parentWrapper = $(this).closest('.course-wrapper');
    var user = parentWrapper.find('.user-email').text();
    var id = parentWrapper.attr('id');
    var action;
    if($(this).hasClass('deactivate')){
        action = 2;
        $actionMessage = "deactivation";
    }else{
        action = 1;
        $actionMessage = "re-activation";
    }
    myModal(`Confirm ${$actionMessage} of user <span>${user}</span>`, `updateUserStatus(${id},${action})`);
});


// Actual update
function updateUserStatus(id, action) {
    var wrapper = $(`.course-wrapper[id=${id}]`);
    $.ajax({
        url: '/updateuserstatus',
        data: {id:id, action:action},
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        beforeSend: function () {
            loader();
        },
        success: function(data){
            // console.log(data);
            successful();
            wrapper.prev('.invalid-feedback').remove();
            if(action == 1){
                wrapper.find('.action').html(`
                    <span class="my-button-red d-none d-xl-inline-block py-0 px-2 deactivate">Deactivate</span>
                    <i class="icon-ban text-danger d-xl-none deactivate" data-toggle="tooltip" data-placement="top" title="disable user"></i>
                `);
            }else{
                wrapper.find('.action').html(`
                    <span class="my-button-green d-none d-xl-inline-block py-0 px-2 reactivate">reactivate</span>
                    <i class="icon-star text-color-green d-xl-none reactivate" data-toggle="tooltip" data-placement="top" title="Activate user"></i>
                `);
            }
        },
        error: function (e) {
            // console.log(e.responseJSON);
            removeLoader();
            insertBeforeError(wrapper, "Action unsuccessful");
        }
    });
    closeModal();
}