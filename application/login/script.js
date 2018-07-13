$(document).ready(function() {    
    
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
                required: 'username is required'
            },
            password: {
                required: 'password is required',
                minlength: 'min 8 characters'
            }
        },
        submitHandler: function (form) {
            var com_action = $('#action').val();
            if(com_action == 'login') {
                ajaxAction('login');
            }

            $('#form_login').trigger('reset');
        }
    });//end validate
    $.validator.addMethod("pwcheck", function (value, element, regexpr) {
        return regexpr.test(value);
    });
    
});

function ajaxAction(action) {
    data = $('#form_login').serializeArray();    

    v_dump = $.ajax({
        url: 'application/login/data.php',
        type: 'POST',
        dataType: 'JSON',
        data: data,
        success: function(response) {
            
            if(response == 1) {
                alert('username atau password salah');
            } else if(response == 0) {
                window.location.href = "index.php";
            }
            
        },
        error: function(response) {
            alert('Malfunction system');
        }
    });            
}