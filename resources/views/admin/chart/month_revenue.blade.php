@extends('layouts.admin_base')

@section('content')

    <h1 class="text-center">This Year Revenue</h1>
    <input name="date" type="month_date" class="" placeholder="Please enter " required>
    <a href=""
       class="btn-primary btn btn-sm mr-2"><i class="fas fa-edit"></i></a>
    <canvas id="myChart" height="100px"></canvas>
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script type="text/javascript">

        var labels = {{ Js::from($labels) }};
        var orders = {{ Js::from($data) }};

        <?php
        for ($i = 0; $i < 12; $i++) {
            if ($i < 9) {
                $month = '0' . $i + 1;
            } else {
                $month = $i + 1;
            }
            $orders = Illuminate\Support\Facades\DB::table('orders')
                ->where('orders.orders_status', '<', 4)
                ->where('orders.orders_status', '>', 0)
                ->where('orders.created_at', 'like', '%' . '-' . $month . '-' . '%')
                ->select('orders.*')
                ->get();
            $sales[$i] = 0;
            foreach ($orders as $order) {
                $sales[$i] = $sales[$i] + ($order->orders_price);
            }

            $invoice = Illuminate\Support\Facades\DB::table('invoices')
                ->where('invoices.invoices_date', 'like', '%' . '-' . $month . '-' . '%')
                ->select('invoices.*')
                ->get();
            $sale[$i] = 0;
            foreach ($invoice as $invoices) {
                $sale[$i] = $sale[$i] + ($invoices->invoices_total);
            }
        }
        ?>


        const data = {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            datasets: [{
                label: 'Total sold',
                backgroundColor: 'rgb(44, 71, 247)',
                borderColor: 'rgb(44, 71, 247)',
                data: [<?php echo $sales[0] ?>, <?php echo $sales[1] ?>, <?php echo $sales[2] ?>, <?php echo $sales[3] ?>, <?php echo $sales[4] ?>, <?php echo $sales[5] ?>,
                    <?php echo $sales[6] ?>, <?php echo $sales[7] ?>, <?php echo $sales[8] ?>, <?php echo $sales[9] ?>, <?php echo $sales[10] ?>, <?php echo $sales[11] ?>
                ]
            },
                {
                    label: 'Total Invoice',
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: [<?php echo $sale[0] ?>, <?php echo $sale[1] ?>, <?php echo $sale[2] ?>, <?php echo $sale[3] ?>, <?php echo $sale[4] ?>, <?php echo $sale[5] ?>,
                        <?php echo $sale[6] ?>, <?php echo $sale[7] ?>, <?php echo $sale[8] ?>, <?php echo $sale[9] ?>, <?php echo $sale[10] ?>, <?php echo $sale[11] ?>
                    ]
                }
                ]
        };

        const config = {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );

    </script>
@endsection
