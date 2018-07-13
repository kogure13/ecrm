$(document).ready(function () {

    $('#btn_add').click(function (e) {
        e.preventDefault();

        $('#add_model').modal({backdrop: 'static', keyboard: false});
        $('.modal-title').html('Tambah Pegawai');
        $('#action').val('add');
        $('#edit_id').val(0);
    });


    $('#btn_cancel').click(function () {
        var $form = $('#form_pegawai');
        $form.trigger('reset');
        $form.validate().resetForm();
        $form.find('.error').removeClass('error');
    });

    var items_jabatan = '';
    var v_dump = $.ajax({
        url: 'application/jabatan/option_jabatan.php',
        dataType: 'JSON',
        success: function (data) {
            $.each(data, function (key, value) {
                items_jabatan += '<option value="' + value.id + '">' + value.jabatan + '</option>';
            });

            $('#jabatan').append(items_jabatan);
        }
    });

    console.log(v_dump)

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
            url: 'application/pegawai/ajax.php',
            error: function () {
                $.Notification.notify(
                        'error', 'top center',
                        'Warning',
                        'Data tidak tersedia'
                        );
            }
        },
        fnDrawCallback: function (oSettings) {

            $('#lookup td.status').each(function () {
                var status = $(this).html();
                switch (status) {
                    case 'Inactive':
                        $(this).addClass('status-inactive');
                        break;
                    case 'Active':
                        $(this).addClass('status-active');
                        break;
                    default:
                        return;
                }
            });

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
                    $('.modal-title').html('Edit pegawai');
                    $('#action').val('edit');
                    $('#edit_id').val(id);

                    v_edit = $.ajax({
                        url: 'application/pegawai/edit.php?id=' + id,
                        type: 'POST',
                        dataType: 'JSON',
                        success: function (data) {
                            $('#nip').val(data.nip);
                            $('#fname').val(data.nama_peg);
                            $('#jabatan').val(data.jabatan_peg);
                            $('#alamat').val(data.alamat_peg);
                            $('#tlp').val(data.no_tlp);
                            $('#email').val(data.email);
                        }
                    });

                } else if (com == 'Delete') {
                    var conf = confirm('Delete this items ?');
                    var url = 'application/pegawai/data.php';

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

    $('#form_pegawai').validate({
        rules: {
            nip: {
                required: true
            },
            fname: {
                required: true
            },
            jabatan: {
                required: true
            },
            email: {
                required: true
            },
            tlp: {
                required: true
            }
        },
        messages: {
            nip: {
                required: '*) field is required'
            },
            fname: {
                required: '*) field is required'
            },
            jabatan: {
                required: '*) choose one'
            },
            email: {
                required: '*) field is required'
            },
            tlp: {
                required: true
            }
        },
        submitHandler: function (form) {
            var com_action = $('#action').val();
            if (com_action == 'add') {
                ajaxAction('add');
            } else if (com_action == 'edit') {
                ajaxAction('edit');
            }

            $('#form_pegawai').trigger('reset');
        }
    });//end validate
    $.validator.addMethod("pwcheck", function (value, element, regexpr) {
        return regexpr.test(value);
    });

});

function ajaxAction(action) {
    data = $('#form_pegawai').serializeArray();
    var table = $('#lookup').DataTable();

    $.ajax({
        url: 'application/pegawai/data.php',
        type: 'POST',
        dataType: 'JSON',
        data: data,
        success: function (response) {
            if (response == 1) {
                alert('Data sudah tersedia');
            } else if (response == 0) {
                $('#add_model').modal('hide');
                table.ajax.reload();
            }

        }
    });
}
