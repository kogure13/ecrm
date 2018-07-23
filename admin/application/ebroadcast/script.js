$(document).ready(function () {

    $('#btn_send').on('click', function () {
        data = $('#form_email').serializeArray();
        console.log(data)
    });

});