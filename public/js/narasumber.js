$('#createNarasumber').on('submit', function (event) {

    event.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: $(this).attr("action"),
        method:"POST",
        data:new FormData(this),
        dataType:'JSON',
        contentType: false,
        cache: false,
        processData: false,
        success: function (response) {
            console.log(response);
            Swal.fire({
                title: response.messages,
                showClass: {
                    popup: 'animate__animated animate__fadeInDown'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp'
                }
            });
            $('.swal2-confirm').click(function(){
                window.location.href = response.route;
            });
        },
        error: function(data) {
            // var dataError = data.responseJSON['errors'].password;

            // Swal.fire({
            //     title: dataError,
            //     showClass: {
            //         popup: 'animate__animated animate__fadeInDown'
            //     },
            //     hideClass: {
            //         popup: 'animate__animated animate__fadeOutUp'
            //     }
            // });
        }
    });
});
