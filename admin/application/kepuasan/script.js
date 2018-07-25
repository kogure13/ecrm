
$(document).ready(function () {
    
    var dataTable = $('#lookup').dataTable({
        'ajax': {
            url: 'application/kepuasan/ajax.php',
            type: 'post',
            dataType: 'json'
        }
    });
});