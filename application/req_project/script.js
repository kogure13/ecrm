$(document).ready(function() {
    var session = $('#idSession').data('value');
    var items_jproyek = '';
    
    $('#rdate').datepicker({
        format: 'yyyy-mm-dd'
    });
    
    $.ajax({
        url: 'admin/application/proyek/option_proyek.php',        
        dataType: 'JSON',
        success: function(data) {
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
            }
        },
        messages: {
            rdate: {
                required: ' *) field is required'
            },
            kproyek: {
                required: ' *) field is required'
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
    });//end validate form
});//end document

function ajaxAction(action) {
    data = $('#form_kproyek').serializeArray();
    var table = $('#lookup').DataTable();

    v_dump = $.ajax({
        url: 'application/req_project/data.php',
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