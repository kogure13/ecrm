$(document).ready(function () {    
    var id = $('#edit_id').val();
    
    $.ajax({
        url: 'application/profile/edit.php?id='+id,
        type: 'post',
        dataType: 'json',
        success: function (data, textStatus, jqXHR) {
            $('#uname').val(data.username);
            $('#password').val(data.password);
        }
    });

    $('#form_users').validate({
        rules: {
            username: {
                required: true
            },
            password: {
                required: true,
                pwcheck: /^[A-Za-z0-9\d=!\-@._*]+$/               
            }

        },
        messages: {
            username: {
                required: ' *) Username is required'
            },
            password: {
                required: '*) Password is required',
                pwcheck: 'at least capital, lower and numeric allowed'                
            }
        },
        submitHandler: function (form) {            
            ajaxAction();
            
        }
    });//end validate
    $.validator.addMethod("pwcheck", function (value, element, regexpr) {
        return regexpr.test(value);
    });

});

function ajaxAction(action) {
    data = $('#form_users').serializeArray();    

    v_dump = $.ajax({
        url: 'application/profile/data.php',
        type: 'POST',
        dataType: 'JSON',
        data: data,        
        success: function(response) {
            if(response == 1){
                alert('Update berhasil');
                location.reload();
            }
        }
    });
    
    console.log(v_dump)
}
