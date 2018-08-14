$(document).ready(function () {

    $('#btn_add').click(function (e) {
        e.preventDefault();

        $('#add_model').modal({backdrop: 'static', keyboard: false});
        $('.modal-title').html('Tambah Promosi');
        $('#action').val('add');
        $('#edit_id').val(0);
    });


    $('#btn_cancel').click(function () {
        var $form = $('#form_promo');
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
            url: 'application/promosi/ajax.php',
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
                console.log(com)

                if (com == 'Edit') {
                    $('#add_model').modal({backdrop: 'static', keyboard: false});
                    $('.modal-title').html('Edit promosi');
                    $('#action_promo').val('edit');
                    $('#edit_id_promo').val(id);

                    v_edit = $.ajax({
                        url: 'application/promosi/edit.php?id=' + id,
                        type: 'POST',
                        dataType: 'JSON',
                        success: function (data) {
                            $('#judul').val(data.judul_promosi);
                            $('#deskripsi').val(data.deskripsi);
                            $('#pawal').val(data.periode_awal);
                            $('#pakhir').val(data.periode_akhir);
                        }
                    });

                } else if (com == 'Delete') {
                    var conf = confirm('Delete this items ?');
                    var url = 'application/promosi/data.php';

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
    
    $('#pawal, #pakhir').datepicker({
        format: 'yyyy-mm-dd'
    });

    $('#form_promo').validate({
        rules: {
            judul: {
                required: true
            },
            deskripsi: {
                required: true
            },
            pawal: {
                required: true
            },
            pakhir: {
                required: true
            }
        },
        messages: {
            judul: {
                required: '*) field is required'
            },
            deskripsi: {
                required: '*) field is required'
            },
            pawal: {
                required: '*) choose one'
            },
            pakhir: {
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

            $('#form_promo').trigger('reset');
        }
    });//end validate
    $.validator.addMethod("pwcheck", function (value, element, regexpr) {
        return regexpr.test(value);
    });

});

function ajaxAction(action) {
    data = $('#form_promo').serializeArray();
    var table = $('#lookup').DataTable();

    v_dump = $.ajax({
        url: 'application/promosi/data.php',
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
    console.log(v_dump)
}
