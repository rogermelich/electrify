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
                            label: "kWh "+a1[0][0].any,
                            backgroundColor: "#cc0041",
                            data: Watts1
                        },
                        {
                            label: "kWh "+a2[0][0].any,
                            backgroundColor: "#014099",
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

<script>

    $(document).ready(function () {
        $.ajax({
            url: "{{url('graph/sumyears')}}",
            method: "GET",
            success: function (data) {
                var Watts = [];
                var Date = [];
                //
                for (var i in data) {
                    Watts.push(data[i][0].watts / 1000);
                    Date.push(data[i][0].any);
                }

                var ctx = document.getElementById('chartSumYears');
                var chartSumYears = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: Date,
                        datasets: [{
                            label: "kWh",
                            backgroundColor: [
                                "#2ecc71",
                                "#3498db",
                                "#9b59b6",
                                "#f1c40f",
                                "#e74c3c"
                            ],
                            data: Watts
                        }],
                        options: {
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

