$(document).ready(function () {

    v_dump = $.ajax({
        url: 'application/home/data.php',
        type: 'post',
        dataType: 'json',
        success: function (data) {
            $('#kepuasan').html(data.jKepuasan);
            $('#keluhan').html(data.jKeluhan);
            $('#tClient').text(data.jClient);
        }
    });

    v_graph = $.ajax({
        url: 'application/home/graph.php',
        dataType: 'json',
        type: 'post',
        success: function (data) {
            //console.log(data);
            var nperiode = [];
            var skeluhan = [];
            var skepuasan = [];

            for (var i in data) {
                nperiode.push(data[i].tanggal);
                skeluhan.push(data[i].keluhan);
                skepuasan.push(data[i].kepuasan);
            }

            var chartdata = {
                labels: nperiode,
                datasets: [
                    {
                        label: 'Kepuasan',
                        backgroundColor: 'rgba(54, 162, 235, 0.5)',
                        borderColor: 'rgba(200, 200, 200, 0.75)',
                        hoverBackgroundColor: 'rgb(73, 139, 218)',
                        hoverBorderColor: 'rgb(73, 139, 218)',
                        stack: 1,
                        data: skepuasan
                    },
                    {
                        label: 'Keluhan',
                        backgroundColor: 'rgba(255, 159, 64, 0.5)',
                        borderColor: 'rgba(200, 200, 200, 0.75)',
                        hoverBackgroundColor: 'rgb(255, 159, 64)',
                        hoverBorderColor: 'rgb(255, 159, 64)',
                        stack: 0,
                        data: skeluhan
                    }
                ]
            };

            var ctx = $("#bar");

            var barGraph = new Chart(ctx, {
                type: 'bar',
                data: chartdata,
                responsive: true,
                maintainAspectRatio: false,
                options: {
                    scales: {
                        yAxes: [{
                                ticks: {
                                    fontSize: 10,
                                    beginAtZero: true
                                }
                            }]
                    }

                }
            });
        },
        error: function (data) {
            console.log(data);
        }
    });//end chart

});//end $ document
