<script>

    $(document).ready(function () {
        $.ajax({
            url: "{{url('graph/actualmonth')}}",
            method: "GET",
            success: function (data) {
                var Watts = [];
                var Date = [];
                //
                for (var i in data) {
                    Watts.push(data[i].watts / 1000);
                    Date.push(data[i].date);
                }
                var ctx = document.getElementById('chartActualMonth');
                var chartActualMonth = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: Date,
                        datasets: [{
                            label: "kWs",
                            borderColor: "#80b6f4",
                            pointBorderColor: "#80b6f4",
                            pointBackgroundColor: "#80b6f4",
                            pointHoverBackgroundColor: "#80b6f4",
                            pointHoverBorderColor: "#80b6f4",
                            pointBorderWidth: 10,
                            pointHoverRadius: 10,
                            pointHoverBorderWidth: 1,
                            pointRadius: 3,
                            fill: false,
                            borderWidth: 3,
                            data: Watts
                        }]
                    },
                    options: {
                        legend: {
                            position: "top"
                        },
                        scales: {
                            yAxes: [{
                                ticks: {
                                    fontColor: "rgba(0,0,0,0.5)",
                                    fontStyle: "bold",
                                    beginAtZero: true,
                                    maxTicksLimit: 5,
                                    padding: 20
                                },
                                gridLines: {
                                    drawTicks: false,
                                    display: false
                                }
                            }],
                            xAxes: [{
                                gridLines: {
                                    zeroLineColor: "transparent"
                                },
                                ticks: {
                                    padding: 20,
                                    fontColor: "rgba(0,0,0,0.5)",
                                    fontStyle: "bold"
                                }
                            }]
                        }
                    }
                })
            }
        })
    });
</script>
