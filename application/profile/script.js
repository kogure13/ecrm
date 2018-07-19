$(document).ready(function () {

    var id = $('#edit_id').val();

    v_edit = $.ajax({
        url: 'application/profile/edit.php?id=' + id,
        type: 'POST',
        dataType: 'JSON',
        success: function (data) {
            $('#uname').val(data.username);
            $('#password').val(data.password);
            $('#cname').val(data.company_name);
            $('#phone').val(data.tlp);
            $('#email').val(data.email);
            $('#caddress').val(data.company_address);
        }
    });

    $('#form_reg').validate({
        rules: {
            cname: {
                required: true
            },
            caddress: {
                required: true
            },
            tlp: {
                required: true,
                number: true
            },
            email: {
                required: true,
                email: true
            },
            uname: {
                required: true
            },
            password: {
                required: true
            }

        },
        messages: {
            cname: {
                required: ' *) Company name is required',
                minlength: 'min 4 characters'
            },
            caddress: {
                required: '*) Address is required'
            },
            tlp: {
                required: '*) Phone number is required'
            },
            email: {
                required: '*) Email is required'
            },
            uname: {
                required: '*) Username is required'
            },
            password: {
                required: '*) Password is required'
            }
        },
        submitHandler: function (form) {
            var com_action = $('#action').val();
            ajaxAction('save');
        }
    });//end validate
    $.validator.addMethod("pwcheck", function (value, element, regexpr) {
        return regexpr.test(value);
    });

});

function ajaxAction(action) {
    data = $('#form_reg').serializeArray();    

    v_dump = $.ajax({
        url: 'application/profile/data.php',
        type: 'POST',
        dataType: 'JSON',
        data: data,      
        success: function (response) {
            if(response == 0) {
                alert('Data berhasil diupdate');

            } else if(response == 1) {
                alert('Data gagal diupdate');
            }
            
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            alert("Status: " + textStatus);
            alert("Error: " + errorThrown);
        }
    });
    
    console.log(v_dump)
}
