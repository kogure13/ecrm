
$(document).ready(function () {
    
    var dataTable = $('#lookup').dataTable({
        'ajax': {
            url: 'application/keluhan/ajax.php',
            type: 'post',
            dataType: 'json'
        }
    });
});