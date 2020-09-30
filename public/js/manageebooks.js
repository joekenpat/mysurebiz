
// onclick event
$('.manage-account').on('click', '.deactivate, .reactivate',  function() {
    var parentWrapper = $(this).closest('.course-wrapper');
    var user = parentWrapper.find('.ebook-title').text();
    var id = parentWrapper.attr('id');
    var action;
    if($(this).hasClass('deactivate')){
        action = 0;
        $actionMessage = "deactivation";
    }else{
        action = 1;
        $actionMessage = "re-activation";
    }
    myModal(`Confirm ${$actionMessage} of Ebook <span>${user}</span>`, `updateUserStatus(${id},${action})`);
});


// Actual update
function updateUserStatus(id, action) {
    var wrapper = $(`.course-wrapper[id=${id}]`);
    $.ajax({
        url: '/admin/ebooks',
        data: {id:id, action:action},
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
            console.log(e.responseJSON);
            removeLoader();
            insertBeforeError(wrapper, "Action unsuccessful");
        }
    });
    closeModal();
}