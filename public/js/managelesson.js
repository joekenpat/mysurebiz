$('.lessons-wrapper .icon-trash').click(function () {
    var parentWrapper = $(this).parent().parent();
    var title = parentWrapper.find('.my-title').text();
    var id = parentWrapper.attr('id');
    myModal(`Confirm deletion of <span>${title}</span>`, `deletelesson(${id})`);
});

function deletelesson(id) {
    // console.log(id);
    // return;
    var wrapper = $(`.lessons-wrapper div[id=${id}]`);
    $.ajax({
        url: '/deletelesson',
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
            // console.log(e.responseJSON);
            removeLoader();
            insertBeforeError(wrapper, "Delete Action unsuccessful");
        }
    });
    closeModal();
}