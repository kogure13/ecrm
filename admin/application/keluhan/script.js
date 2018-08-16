$(document).ready(function () {
    
    $('#btn_cancel').click(function () {
        var $form = $('#form_keluhan');
        $form.trigger('reset');
        $form.validate().resetForm();
        $form.find('.error').removeClass('error');
    });

    var dataTable = $('#lookup').dataTable({
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
            url: 'application/keluhan/ajax.php',
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
                    $('.modal-title').html('Feedback Keluhan');
                    $('#action').val('edit');
                    $('#edit_id').val(id);

                    v_edit = $.ajax({
                        url: 'application/keluhan/edit.php?id=' + id,
                        type: 'POST',
                        dataType: 'JSON',
                        success: function (data) {                            
                            $('#keterangan').val(data.keterangan);
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

    $('#form_keluhan').validate({
        rules: {
            keterangan: {
                required: true,
                minlength: 30
            }
        },
        messages: {
            keterangan: {
                required: "Field is required"
            }
        },
        submitHandler: function (form) {
            var com_action = $('#action').val();
            ajaxAction();

            $('#form_keluhan').trigger('reset');
        }
    });
});

function ajaxAction() {
    data = $('#form_keluhan').serializeArray();
    table = $('#lookup').DataTable();

    v_dump = $.ajax({
        url: 'application/keluhan/data.php',
        type: 'POST',
        dataType: 'JSON',
        data: data,
        success: function (response) {

            $('#add_model').modal('hide');
            $('#action').val('add');
            $('#edit_id').val('0');
            table.ajax.reload();

        }
    });
}//end ajaxAction