// $(function() {
//     $('#adminLogin button').click(function (e) {
//         e.preventDefault();
//         var form = $('#adminLogin');
//         // var formdata = false;
//         formdata = new FormData(form[0]);
//         // var formAction = form.attr('action');
//
//         $.ajax({
//             url: '/login',
//             data: formdata ? formdata : form.serialize(),
//             cache: false,
//             contentType: false,
//             processData: false,
//             // dataType: "json",
//             type: 'POST',
//             success: function (data, textStatus, jqXHR) {
//                 console.log(data);
//             },
//             beforeSend: function () {
//             },
//             error: function (e) {
//                 console.log(e);
//             }
//         });
//
//     });
// });
