$(document).ready(function () {
    
    v_auto = $('#eto').autocomplete({
        source: 'application/client/autogrid.php',
        select: function(event, ui) {
            event.preventDefault();
            $('#eto').val(ui.item.id);
        }
    });       

    $('#form_email').validate({
        rules: {
            eto: {
                required: true
            },
            esubject: {
                required: true
            },
            summernote : {
                required: true
            }
        },
        submitHandler: function(form) {
            ajaxSend();

            $('#form_email').trigger('reset');
        }
    });//end form email broadcast

});

function ajaxSend() {
    data = $('#form_email').serializeArray();

    v_dump = $.ajax({
        url: 'application/ebroadcast/data.php',
        type: 'post',
        dataType: 'json',
        data: data,
        success: function(response) {
            alert('Pesan Berhasil dikirim');
            window.location.reload();
        }
    });
    console.log(v_dump)
}