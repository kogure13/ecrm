$(document).ready(function () {
    var session = $('#idSession').data('value');
    var items_jproyek = '';

    $('#rdate').datepicker({
        format: 'yyyy-mm-dd'
    });

    $.ajax({
        url: 'admin/application/proyek/option_proyek.php',
        dataType: 'JSON',
        success: function (data) {
            $.each(data, function (key, value) {
                items_jproyek += '<option value="' + value.id + '">' + value.nama_proyek + '</option>';
            });

            $('#kproyek').append(items_jproyek);
        }
    });

    $('#btn_add').click(function (e) {
        e.preventDefault();

        $('#add_model').modal({backdrop: 'static', keyboard: false});
        $('.modal-title').html('Tambah permintaan project');
        $('#action').val('add');
        $('#edit_id').val(0);
    });

    $('#btn_cancel').click(function () {
        var $form = $('#form_kproyek');
        $form.trigger('reset');
        $form.validate().resetForm();
        $form.find('.error').removeClass('error');
    });    

    $('#btn_cancel_commit').click(function () {
        var $form = $('#form_comment');
        $form.trigger('reset');
        $form.validate().resetForm();
        $form.find('.error').removeClass('error');
        $('#rdp').attr('style', 'display: none');        
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
            url: 'application/req_project/ajax.php'
        },
        fnDrawCallback: function (oSettings) {            

            $('.act_btn').on('click', function (e) {
                e.preventDefault();
                var com = $(this).attr('data-original-title');
                var id = $(this).attr('id');

                if (com == 'Edit') {
                    $('#add_model').modal({backdrop: 'static', keyboard: false});
                    $('.modal-title').html('Edit Permintaan Project');
                    $('#action').val('edit');
                    $('#edit_id').val(id);

                    v_edit = $.ajax({
                        url: 'application/req_project/edit.php?id=' + id,
                        type: 'POST',
                        dataType: 'JSON',
                        success: function (data) {
                            $('#noreg').val(data.no_reg);
                            $('#rdate').val(data.tgl_request);
                            $('#kproyek').val(data.id_proyek);
                            $('#keterangan').val(data.keterangan);
                        }
                    });
                } else if(com == 'comment') {  

                    $('#comment_model').modal({backdrop: 'static', keyboard: false});                    
                    $('.modal-title').html('Beri Penilaian Anda');                    
                    $('#edit_id_comment').val(id);

                    $('.rdc_btn').on('change', function(e) {
                        e.preventDefault();
                        if($(this).val() == 1) {
                            $('#rdp').attr('style','display: block');
                        } else if($(this).val() == 0) {
                            $('#rdp').attr('style','display: none');
                            $('.rdstar').attr('checked', false);
                        }
                    });
                }
            });
        }
    });//end datatable

    $('#form_kproyek').validate({
        rules: {
            rdate: {
                required: true
            },
            kproyek: {
                required: true
            },
            keterangan: {
                required: true
            }
        },
        messages: {
            rdate: {
                required: '*) field is required'
            },
            kproyek: {
                required: '*) field is required'
            },
            keterangan: {
                required: '*) choose one'
            }
        },
        submitHandler: function (form) {
            var com_action = $('#action').val();
            if (com_action == 'add') {
                ajaxAction('add');
            } else if (com_action == 'edit') {
                ajaxAction('edit');
            }

            $('#form_kproyek').trigger('reset');
        }
    });//end validate form kproyek

    $('#form_comment').validate({
        rules: {
            keterangan: {
                required: true,
                minlength: 30
            },
            rdc: {
                required: true
            }
        },
        messages: {
            rdc: {
                required: "Pilih Salah Satu"                
            }
        },
        errorPlacement: function(error, element) {
            if(element.is(":radio")) {
                error.appendTo(element.parents('.text-muted'));
            } else {
                error.insertAfter(element);
            }
        },
        submitHandler: function(form) {
            var com_action = $('#action').val();
            ajaxComment('add');

            $('#form_comment').trigger('reset');
        }
    });
});//end $ document

function ajaxAction(action) {
    data = $('#form_kproyek').serializeArray();
    table = $('#lookup').DataTable();

    v_dump = $.ajax({
        url: 'application/req_project/data.php',
        type: 'POST',
        dataType: 'JSON',
        data: data,
        success: function (response) {
            if (response == 1) {
                alert('Data sudah tersedia');
            } else if (response == 0) {
                $('#add_model').modal('hide');
                $('#action').val('add');
                $('#edit_id').val('0');
                table.ajax.reload();
            }
        }
    });    
}//end ajaxAction

function ajaxComment(action) {
    data = $('#form_comment').serializeArray();

    console.log(data)
}