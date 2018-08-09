$(document).ready(function () {

    $('#btn_cancel').click(function () {
        var $form = $('#form_prospek');
        $form.trigger('reset');
        $form.validate().resetForm();
        $form.find('.error').removeClass('error');
        $('#kode').attr('readonly', false);
    });

    var items_pjname = '';
    $.ajax({
        url: 'application/pegawai/option_pegawai.php',
        dataType: 'json',
        success: function (data, textStatus, jqXHR) {
            $.each(data, function (key, value) {
                items_pjname += '<option value="' + value.id + '">' + value.nama_peg + '</option>';
            });

            $('#pjname').append(items_pjname);
        }
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
            url: 'application/prospek/ajax.php',
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
                    $('.modal-title').html('detail prospek');
                    $('#action').val('edit');
                    $('#edit_id').val(id);

                    v_edit = $.ajax({
                        url: 'application/prospek/edit.php?id=' + id,
                        type: 'POST',
                        dataType: 'JSON',
                        success: function (data) {
                            $('#pjname').val(data.id_pegawai);
                            $('#stprospek').val(data.status);
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

    $('#form_prospek').validate({
        rules: {
            pjname: {
                required: true
            },
            stprospek: {
                required: true
            }
        },
        messages: {
            pjname: {
                required: ' *) field is required'
            },
            stprospek: {
                required: '*) field is required'
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
});//end $ document

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
}//end ajaxAction