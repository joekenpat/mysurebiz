$.ajax({
    url: url,
    data: {id:id},
    type: 'PUT',
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    success: function (data, textStatus, jqXHR) {
        // console.log(data);
    },
    error: function (e) {
        // console.log(e.responseJSON);
    }
});