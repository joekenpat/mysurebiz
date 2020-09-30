$('.notifications div.dropdown-item i.icon-trash').click(function () {
    var messageId = $(this).data('id');
    myModal(`Confirm Message deletion <br> <b>Note: </b>User will be deleted permanently.</small>`, `deleteMessage(${messageId})`);

});

function deleteMessage(id) {
    var wrapper = $(`i[data-id="${id}"]`).parent();
    $.ajax({
        url: url,
        data: {id:id},
        type: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        beforeSend: function () {
            loader();
        },
        success: function(data){
            successful();
            wrapper.prev('.invalid-feedback').remove();
            wrapper.next('.lessons-wrapper').remove();
            wrapper.remove();
        },
        error: function (e) {
            removeLoader();
            insertBeforeError(wrapper, "Delete Action unsuccessful");
        }
    });
    closeModal();
}