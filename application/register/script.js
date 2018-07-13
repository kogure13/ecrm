$(document).ready(function() {    
    
    $('#form_reg').validate({
        rules: {            
            email: {
                required: true,
                email: true
            },                        
            uname: {
                required: true
            },
            password: {
                required: true
            },
            cname: {
                required: true
            },
            phone: {
                required: true, 
                number: true
            },
            caddress: {
                required: true
            }
            

        },
        messages: {
            email: {
                required: 'email is required'
            },
            uname: {
                required: 'username is required'
            },
            password: {
                required: 'password is required',
                minlength: 'min 8 characters'
            },
            cname: {
                required: ' *) Company name is required',
                minlength: 'min 4 characters'
            },
            caddress: {
                required: '*) Address is required'
            },
            phone: {
                required: '*) Phone number is required'
            }
        },
        submitHandler: function (form) {
            var com_action = $('#action').val();
            if(com_action == 'save') {
                ajaxAction('save');
            }

            $('#form_reg').trigger('reset');
        }
    });//end validate
    $.validator.addMethod("pwcheck", function (value, element, regexpr) {
        return regexpr.test(value);
    });
    
});

function ajaxAction(action) {
    data = $('#form_reg').serializeArray();    

    $.ajax({
        url: 'admin/application/client/data.php',
        type: 'POST',
        dataType: 'JSON',
        data: data,
        success: function(response) {
            if(response == 0) {
                alert('Terima kasih, atas kepercayaan dan partisipai anda');
            }else if(response == 1) {
                alert('email sudah terdaftar');
            }
        }
    });    
}