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
            url: "{{url('graph/all')}}",
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

                var chartdata = {
                    labels: Date,
                    datasets: [
                        {
                            label: 'Watts',
                            backgroundColor: 'rgba(200, 200, 200, 0.75)',
                            borderColor: 'rgba(200, 200, 200, 0.75)',
                            hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
                            hoverBorderColor: 'rgba(200, 200, 200, 1)',
                            data: Watts
                        }
                    ]
                };

                // Ons es declara el Chart
                var ctx = $("#mycanvas");

                var barGraph = new Chart(ctx, {
                    type: 'bar',
                    data: chartdata
                });
            },
            error: function (data) {
                console.log(data);
            }
        });
    });
</script>

{{--<script>--}}
    {{--var ctx = document.getElementById("myChart").getContext('2d');--}}
    {{--var myChart = new Chart(ctx, {--}}
        {{--type: 'bar',--}}
        {{--data: {--}}
            {{--labels: [],--}}
            {{--datasets: [{--}}
                {{--label: '# of Votes',--}}
                {{--data: [],--}}
                {{--backgroundColor: [--}}
                    {{--'rgba(255, 99, 132, 0.2)'--}}
                {{--],--}}
                {{--borderColor: [--}}
                    {{--'rgba(255,99,132,1)'--}}
                {{--],--}}
                {{--borderWidth: 1--}}
            {{--}]--}}
        {{--},--}}
        {{--options: {--}}
            {{--scales: {--}}
                {{--yAxes: [{--}}
                    {{--ticks: {--}}
                        {{--beginAtZero: true--}}
                    {{--}--}}
                {{--}]--}}
            {{--}--}}
        {{--}--}}
    {{--});--}}
{{--</script>--}}

<!-- Optionally, you can add Slimscroll and FastClick plugins.
      Both of these plugins are recommended to enhance the
      user experience. Slimscroll is required when using the
      fixed layout. -->
