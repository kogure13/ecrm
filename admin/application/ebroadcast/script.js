$(document).ready(function () {

    $('#form_email').validate({
        rules: {
            eto: {
                required: true
            }
        },
        submitHandler: function(form) {
            ajaxSend();

            $('#form_email').trigger('reset');
        }
    });

});

function ajaxSend() {
    data = $('#form_email').serializeArray();

    v_dump = $.ajax({
        url: 'application/ebroadcast/data.php',
        type: 'post',
        dataType: 'json',
        data: data,
        success: function(response) {
            alert(response);
        }
    });

    console.log(data)
}