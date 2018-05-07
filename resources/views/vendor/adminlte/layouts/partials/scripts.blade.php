<!-- REQUIRED JS SCRIPTS -->

<!-- JQuery and bootstrap are required by Laravel 5.3 in resources/assets/js/bootstrap.js-->
<!-- Laravel App -->
<script src="{{ url (mix('/js/app.js')) }}" type="text/javascript"></script>

{{--Dropdown Calendar--}}
<script>
    $(document).ready(function () {
        var now = new Date();

        var day = ("0" + now.getDate()).slice(-2);
        var month = ("0" + (now.getMonth() + 1)).slice(-2);

        var today = now.getFullYear() + "-" + (month) + "-" + (day);


        $('#datePicker').val(today);
    });
</script>

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

                    Watts.push(data[i].watts);
                    Date.push(data[i].date);
                    console.log(data[i]);

                }
                var ctx = document.getElementById('chartActualMonth').getContext("2d");
                var chartActualMonth = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: Date,
                        datasets: [{
                            label: "Watts",
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

<script>

    $(document).ready(function () {
        $.ajax({
            url: "{{url('graph/summonth')}}",
            method: "GET",
            success: function (data) {
                var Watts = [];
                var Date = [];
                //
                for (var i in data) {

                    Watts.push(data[i].watts);
                    Date.push(data[i].mes_nom);
                    console.log(data[i]);

                }
                var ctx = document.getElementById('chartSumMonth').getContext("2d");
                var chartSumMonth = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: Date,
                        datasets: [{
                            backgroundColor: [
                                "#2ecc71",
                                "#3498db",
                                "#95a5a6",
                                "#9b59b6",
                                "#f1c40f",
                                "#e74c3c",
                                "#34495e",
                                "#cc0066",
                                "#000099",
                                "#663300",
                                "#ffff00",
                                "#003300"
                            ],
                            data: Watts
                        }],
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
                    }
                })
            }
        })
    });
</script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->
