$(document).ready(function () {

    v_dump = $.ajax({
        url: 'application/home/data.php',
        type: 'post',
        dataType: 'json',
        success: function (data) {
            $('#kepuasan').html(data.jKepuasan);
            $('#keluhan').html(data.jKeluhan);
            $('#tClient').html(data.jClient);
        }
    });
});

google.charts.load('current', {'packages': ['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {

    // membuat data chart dari json yang sudah ada di atas
    var data = google.visualization.arrayToDataTable([
        ['Element', 'Density', {role: 'style'}],
        ['Copper', 8.94, '#b87333'], // RGB value
        ['Silver', 10.49, 'silver'], // English color name
        ['Gold', 19.30, 'gold'],
        ['Platinum', 21.45, 'color: #e5e4e2'], // CSS-style declaration
    ]);

    // Set options, bisa anda rubah
    var options = {'title': '',
        'width': 800 };

    var chart = new google.visualization.ColumnChart(document.getElementById('myChart'));
    chart.draw(data, options);
}
