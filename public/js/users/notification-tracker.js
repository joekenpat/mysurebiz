
//Update User score view

if(location.href.split('#')[1]){
    var url = location.href.split('#')[0];
    var id = url.split('/')[4];
    var type = url.split('/')[3];
    if(type.toLowerCase() === "finalproject"){
        type = "course";
    }

    $.ajax({
        url: `/notifications/track`,
        data: {type:type, id:id},
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
}