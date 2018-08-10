$(document).ready(function () {

    $('#btn_add').click(function (e) {
        e.preventDefault();

        $('#add_model').modal({backdrop: 'static', keyboard: false});
        $('.modal-title').html('Tambah Pegawai');
        $('#action').val('add');
        $('#edit_id').val(0);
    });


    $('#btn_cancel').click(function () {
        var $form = $('#form_kproduk');
        $form.trigger('reset');
        $form.validate().resetForm();
        $form.find('.error').removeClass('error');
    });

    var items_kproduk = '';
    var v_dump = $.ajax({
        url: 'application/kproduk/option_kproduk.php',
        dataType: 'JSON',
        success: function (data) {
            $.each(data, function (key, value) {
                items_kproduk += '<option value="' + value.id + '">' + value.kategori_produk + '</option>';
            });

            $('#kproduk').append(items_kproduk);
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
            url: 'application/kproduk/ajax.php',
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
                    $('.modal-title').html('Edit pegawai');
                    $('#action').val('edit');
                    $('#edit_id').val(id);

                    v_edit = $.ajax({
                        url: 'application/kproduk/edit.php?id=' + id,
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
                    var url = 'application/kproduk/data.php';

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

    $('#form_kproduk').validate({
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

            $('#form_kproduk').trigger('reset');
        }
    });//end validate
    $.validator.addMethod("pwcheck", function (value, element, regexpr) {
        return regexpr.test(value);
    });

});

function ajaxAction(action) {
    data = $('#form_kproduk').serializeArray();
    var table = $('#lookup').DataTable();

    $.ajax({
        url: 'application/kproduk/data.php',
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
