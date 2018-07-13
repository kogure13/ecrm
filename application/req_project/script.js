$(document).ready(function() {
    var session = $('#idSession').data('value');
    var items_jproyek = '';
    
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
    
    var noreg= $.ajax({
        url: 'application/req_project/genreg.php',
        dataType: 'JSON',
        success: function (data) {
            $('#noreg').val(data.regno);
        }
    });
    
    console.log(noreg)
    
    $('#btn_add').click(function (e) {
        e.preventDefault();

        $('#add_model').modal({backdrop: 'static', keyboard: false});
        $('.modal-title').html('Tambah permintaan project');
        $('#action').val('add');
        $('#edit_id').val(0);
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
                    $('#btn_jabatan').html('Edit Permintaan Project');                    
                    $('#action').val('edit');
                    $('#edit_id').val(id);

                    v_edit = $.ajax({
                        url: 'application/req_project/edit.php?id=' + id,
                        type: 'POST',
                        dataType: 'JSON',
                        beforeSend: function () {
                            $('#err-loading').css('display', 'inline', 'important');
                            $('#err-loading').html("<img src='theme/asset/images/loading.gif' height='20px' /> Loading...");
                        },
                        success: function (data) {                            
                            $('#noreg').val(data.no_reg);
                            $('#rdaate').val(data.tgl_request);
                            $('#kproyek').val(data.id_proyek);
                            $('#keterangan').val(data.keterangan);
                        }
                    });
                } 
            });
        }
    });//end datatable        
});