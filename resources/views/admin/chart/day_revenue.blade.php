@extends('layouts.admin_base')

@section('content')
    <body>
    <h1>Laravel Highcharts Example - ItSolutionStuff.com</h1>
    <div id="container"></div>
    </body>

@endsection

@push('js')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script type="text/javascript">
    var orders =  <?php echo json_encode($orders)?>;
    var d = new Date();

    Highcharts.chart('container', {
        title: {
            text: 'Order, 2022'
        },
        subtitle: {
            text: 'Source: itsolutionstuff.com.com'
        },
        xAxis: {

            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        },
        yAxis: {
            title: {
                text: 'Number of New Users'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                allowPointSelect: true

            }
        },
        series: [{
            name: 'Total orders revenue',
            data: orders
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
    });
</script>
@endpush
