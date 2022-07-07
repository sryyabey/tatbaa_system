function view(ths) {
    const route = $(ths).data('url');
    console.log(route)


    $.ajax({
        type: "GET",
        url: route,

        success: function (msg) {
            $('#modal-body').html(msg)
        }
    });
}
