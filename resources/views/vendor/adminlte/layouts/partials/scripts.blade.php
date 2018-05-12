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
                    Watts.push(data[i].watts / 1000);
                    Date.push(data[i].date);
                }
                var ctx = document.getElementById('chartActualMonth');
                var chartActualMonth = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: Date,
                        datasets: [{
                            label: "KWs",
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
                    Watts.push(data[i].watts / 1000);
                    Date.push(data[i].mes_nom);
                }

                var ctx = document.getElementById('chartSumMonth');
                var chartSumMonth = new Chart(ctx, {
                    type: 'polarArea',
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

<script>

    $(document).ready(function () {
        var ajax1 = $.ajax({
            dataType: "json",
            url: "{{url('graph/summonthyear')}}",
            success: function (data) {
                var Watts1 = [];
                var Date1 = [];
                var Year1 = [];
                //
                for (var i in data) {

                    Watts1.push(data[i].watts);
                    Date1.push(data[i].mes_nom);
                    Year1.push(data[i].any);
                }
            }
        });
        var ajax2 = $.ajax({
            dataType: "json",
            url: "{{url('graph/summonth')}}",
            success: function (data) {
                var Watts2 = [];
                var Date2 = [];
                var Year2 = [];
                //
                for (var i in data) {

                    Watts2.push(data[i].watts);
                    Date2.push(data[i].mes_nom);
                    Year2.push(data[i].any)
                }
            }
        });

        $.when(ajax1, ajax2).done(function (a1, a2) {
            var Watts1 = [];
            var Watts2 = [];
            var Data1 = [];
            var Data2 = [];
            //
            for (var i in a1[0]) {
                Watts1.push(a1[0][i].watts / 1000);
                Data1.push(a1[0][i].mes_nom);
            }

            for (var i in a2[0]) {
                Watts2.push(a2[0][i].watts / 1000);
                Data2.push(a1[0][i].mes_nom);
            }

            var ctx = document.getElementById('chartMonthYear');
            var chartMonthYear = new Chart(ctx, {
                type: 'bar',
                data: {
                    datasets: [
                        {
                            label: a1[0][0].any,
                            backgroundColor: "#2ecc71",
                            data: Watts1
                        },
                        {
                            label: a2[0][0].any,
                            backgroundColor: "#000099",
                            data: Watts2,
                            type: 'bar'
                        }
                    ],
                    labels: Data1
                },
                options: {
                    legend: {
                        position: "top"
                    }
                }
            })
        })
    });
</script>


<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->
