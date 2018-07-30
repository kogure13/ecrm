$(document).ready(function() {        
    
    var dataTable = $('#lookup').DataTable({
        'autoWidth': false,
        'aoColumnDefs': [
            {'bSortable': false, 'aTargets': ['nosort']}
        ],
        'processing': true,
        'serverSide': true,
        'ajax': {
            type: 'POST',
            dataType: 'JSON',
            url: 'application/user/ajax.php',
            error: function () {
                $.Notification.notify(
                        'error', 'top center',
                        'Warning',
                        'Data tidak tersedia'
                        );
            }
        },
        fnDrawCallback: function (oSettings) {

            $('.act_btn').each(function () {
                $(this).tooltip({
                    html: true
                });
            });

            $('.act_btn').on('click', function (e) {
                e.preventDefault();
                var com = $(this).attr('data-original-title');
                var id = $(this).attr('id');

                if (com == 'Edit') {
                    $('#add_model').modal({backdrop: 'static', keyboard: false});
                    $('.modal-title').html('Edit User');
                    $('#action').val('edit');
                    $('#edit_id').val(id);

                    v_edit = $.ajax({
                        url: 'application/user/edit.php?id=' + id,
                        type: 'POST',
                        dataType: 'JSON',
                        success: function (data) {                            
                            $('#username').val(data.username);
                            $('#password').val(data.password);
                            $('#role').val(data.role);
                        }
                    });

                } else if (com == 'Delete') {
                    var conf = confirm('Delete this items ?');
                    var url = 'application/user/data.php';

                    if (conf) {
                        $.post(url, {id: id, action: com.toLowerCase()}, function () {
                            var table = $('#lookup').DataTable();
                            table.ajax.reload();
                        });
                    }
                }
            });
        }
    });//end datatable
    
    $('#form_user').validate({
        rules: {
            uname: {
                required: true
            },
            password: {
                required: true
            },
            role: {
                required: true
            }
        },
        messages: {
            uname: {
                required: ' *) field is required'
            },
            password: {
                required: '*) field is required'
            },
            role: {
                required: '*) pilih salah satu'
            }
        },
        submitHandler: function (form) {
            ajaxAction();
        }
    });
});

function ajaxAction() {
    data = $('#form_user').serializeArray();
    var table = $('#lookup').DataTable();

    v_dump = $.ajax({
        url: 'application/user/data.php',
        type: 'POST',
        dataType: 'JSON',
        data: data,
        success: function (response) {
            
                $('#add_model').modal('hide');
                table.ajax.reload();
            
        },
        error: function (response) {
            alert('error system');
        }
    });

    console.log(v_dump)
}