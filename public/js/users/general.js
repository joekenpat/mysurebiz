//Video tracking
function videoTracker(id) {
    $.ajax({
        url: '/videotracker/'+id,
        type: 'PUT',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
}

$(function() {
    $(".first-welcome").delay(1000).fadeIn(1000);
    $(".second-welcome").delay(2000).fadeIn(2000);
});