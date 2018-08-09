$(document).ready(function () {

    $('#btn_add').click(function (e) {
        e.preventDefault();

        $('#add_model').modal({backdrop: 'static', keyboard: false});
        $('.modal-title').html('Add new client');
        $('#action').val('add');
        $('#edit_id').val(0);
    });

    $('#btn_ebroadcast').click(function (e) {
        e.preventDefault();

        window.location.href = "?page=ebroadcast";
    });

    $('#btn_cancel').click(function (e) {
        e.preventDefault();
        var $form = $('#form_client');

        $form.trigger('reset');
        $form.validate().resetForm();
        $form.find('.error').removeClass('error');
    });

    var dataTable = $('#lookup').DataTable({
        'autoWidth': true,
        'aoColumnDefs': [
            {'bSortable': false, 'aTargets': ['nosort']},
            {'sClass': 'text-right', 'aTargets': [0]}
        ],
        'processing': true,
        'serverSide': true,
        'ajax': {
            type: 'POST',
            dataType: 'JSON',
            url: 'application/client/ajax.php',
            error: function () {
                $.Notification.notify(
                        'error', 'top center',
                        'Warning',
                        'Data tidak tersedia'
                        );
            }
        },
        rowCallback: function (row, data, iDisplayIndex) {
            var info = this.fnPagingInfo();
            var page = info.iPage;
            var length = info.iLength;
            var index = page * length + (iDisplayIndex + 1);
            $('td:eq(0)', row).html(index);
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
                    $('.rdinput').attr('disabled', true);
                    $('.modal-title').html('<i class="fa fa-info-circle text-primary"></i> Purpose client to prospek');
                    $('#action').val('edit');
                    $('#edit_id').val(id);

                    v_edit = $.ajax({
                        url: 'application/client/edit.php?id=' + id,
                        type: 'POST',
                        dataType: 'JSON',
                        success: function (data) {
                            $('#uname').val(data.username);
                            $('#cname').val(data.company_name);
                            $('#caddress').val(data.company_address);
                            $('#tlp').val(data.tlp);
                            $('#email').val(data.email);
                            $('#jdate').val(data.date_register);
                        }
                    });

                } else if (com == 'Delete') {
                    var conf = confirm('Delete this items ?');
                    var url = 'application/client/data.php';

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

    $('#form_client').validate({
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
            jdate: {
                required: true
            },
            email: {
                required: true,
                email: true
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
            jdate: {
                required: '*) Date is required'
            },
            email: {
                required: '*) Email is required'
            }
        },
        submitHandler: function (form) {
            var com_action = $('#action').val();
            if (com_action == 'add') {
                ajaxAction('add');
            } else if (com_action == 'edit') {
                ajaxAction('edit');
            }

            $('#form_client').trigger('reset');
        }
    });//end validate
    $.validator.addMethod("pwcheck", function (value, element, regexpr) {
        return regexpr.test(value);
    });

    $('#jdate').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd'
    });

});

function ajaxAction(action) {
    data = $('#form_client').serializeArray();
    var table = $('#lookup').DataTable();

    v_dump = $.ajax({
        url: 'application/client/data.php',
        type: 'POST',
        dataType: 'JSON',
        data: data,
        success: function (response) {
            $('#add_model').modal('hide');
            table.ajax.reload();
            $('#action').val('add');
            $('#edit_id').val('0');
        }
    });
}
