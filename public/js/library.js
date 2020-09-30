$('.my-library .icon-close, .lessons-wrapper .icon-close').click(function () {
    var parentWrapper = $(this).parent();
    var title = parentWrapper.find('a').text();
    var id = parentWrapper.attr('id');
    myModal(`Confirm deletion of <span>${title}</span><br><small><b>Note: </b>File will be deleted permanently.</small>`, `deleteLibrary(${id})`);
});

function deleteLibrary(id) {
    var wrapper = $(`.course-material[id=${id}]`);
    $.ajax({
        url: '/deletelibrary',
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
