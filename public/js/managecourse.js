$('.course-wrapper .icon-trash').click(function () {
    var parentWrapper = $(this).parent().parent();
    var title = parentWrapper.find('.my-title').text();
    var id = parentWrapper.attr('id');
    myModal(`Confirm deletion of <span>${title}</span>`, `deleteCourse(${id})`);
});

function deleteCourse(id) {
    var wrapper = $(`.course-wrapper[id=${id}]`);
    $.ajax({
        url: '/deletecourse',
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