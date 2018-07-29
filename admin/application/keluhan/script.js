$(document).ready(function () {

    var dataTable = $('#lookup').dataTable({
        'autoWidth': true,
        'aoColumnDefs': [
            {'bSortable': false, 'aTargets': ['nosort']}
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
                        url: 'application/keluhan/edit.php?id=' + id,
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
    console.log(dataTable)
});