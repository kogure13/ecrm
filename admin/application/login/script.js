$(document).ready(function () {

    $('#form_login').validate({
        rules: {
            uname: {
                required: true
            },
            password: {
                required: true
            }
        },
        messages: {
            uname: {
                required: ' *) field is required'
            },
            password: {
                required: '*) field is required'
            }
        },
        submitHandler: function (form) {
            ajaxAction();
        }
    });
});

function ajaxAction() {
    data = $('#form_login').serializeArray();

    v_login = $.ajax({
        url: 'application/login/data.php',
        type: 'POST',
        dataType: 'JSON',
        data: data,
        success: function (response) {
            if(response == 1) {
                window.location.href = 'index.php';
            } else if(response == 0) {
                alert('username atau password anda salah');
            } else if(response == 404) {
                alert('username tidak terdaftar');
            }
        },
        error: function (response) {
            alert('error login');
        }
    });    
}