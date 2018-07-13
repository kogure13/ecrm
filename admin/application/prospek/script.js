$(document).ready(function () {

    $('#btn_add').click(function (e) {
        e.preventDefault();

        $('#add_model').modal({backdrop: 'static', keyboard: false});
        $('.modal-title').html('Porpsek Detail');
        $('#action').val('add');
        $('#edit_id').val(0);
    });

    $('#btn_cancel').click(function () {
        var $form = $('#form_prospek');
        $form.trigger('reset');
        $form.validate().resetForm();
        $form.find('.error').removeClass('error');
        $('#kode').attr('readonly', false);
    });

    var dataTable = $('#lookup').DataTable({
        'autoWidth': true,
        'aoColumnDefs': [
            {'bSortable': false, 'aTargets': ['nosort']}
        ],
        'processing': true,
        'serverSide': true,
        'ajax': {
            type: 'POST',
            dataType: 'JSON',
            url: 'application/prospek/ajax.php',
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
                    $('.modal-title').html('Edit detail prospek');
                    $('#action').val('edit');
                    $('#edit_id').val(id);

                    v_edit = $.ajax({
                        url: 'application/prospek/edit.php?id=' + id,
                        type: 'POST',
                        dataType: 'JSON',
                        beforeSend: function () {

                        },
                        success: function (data) {
                            $('#kode').val(data.kode_proyek);
                            $('#proyek').val(data.nama_proyek);
                            $('#keterangan').val(data.keterangan);
                        }
                    });

                } else if (com == 'Delete') {
                    var conf = confirm('Delete this items ?');
                    var url = 'application/prospek/data.php';

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
    
    console.log(dataTable)

    $('#form_prospek').validate({
        rules: {
            kode: {
                required: true
            },
            proyek: {
                required: true
            }
        },
        messages: {
            kode: {
                required: ' *) field is required'
            },
            proyek: {
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

            $('#form_prospek').trigger('reset');
        }
    });
});

function ajaxAction(action) {

    data = $('#form_prospek').serializeArray();
    var table = $('#lookup').DataTable();

    v_dump = $.ajax({
        url: 'application/prospek/data.php',
        type: 'POST',
        dataType: 'JSON',
        data: data,
        success: function (response) {
            if (response == 1) {
                $.Notification.notify(
                        'error', 'top center',
                        'Warning',
                        'Data sudah tersedia'
                        );
            } else {
                $.Notification.notify(
                        'success', 'top center',
                        'Success',
                        'Data berhasil diproses'
                        );
            }

            $('#add_model').modal('hide');
            table.ajax.reload();

            $('#action').val('add');
            $('#edit_id').val('0');
        }
    });
}