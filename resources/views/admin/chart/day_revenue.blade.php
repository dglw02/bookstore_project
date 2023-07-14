@extends('layouts.admin_base')

@section('content')

    <h1 class="text-center">This Month Revenue</h1>
        <input name="day_date" type="date" class="" placeholder="Please enter " required>
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
        for ($i = 0; $i < 31; $i++) {
            if ($i < 9) {
                $day = '0' . $i + 1;
            } else {
                $day = $i + 1;
            }
            $orders = Illuminate\Support\Facades\DB::table('orders')
                ->where('orders.orders_status', '<', 4)
                ->where('orders.orders_status', '>', 0)
                ->where('orders.created_at', 'like', '%' . '-' . '%' . '-' .$day )
                ->select('orders.*')
                ->get();

            $sales[$i] = 0;
            foreach ($orders as $order) {
                $sales[$i] = $sales[$i] + ($order->orders_price);
            }

            $invoice = Illuminate\Support\Facades\DB::table('invoices')
                ->where('invoices.invoices_date', 'like', '%' . '-' . '%' . '-' . $day)
                ->select('invoices.*')
                ->get();

            $sale[$i] = 0;
            foreach ($invoice as $invoices) {
                $sale[$i] = $sale[$i] + ($invoices->invoices_total);
            }

        }
        ?>


        const data = {
            labels: ['1st', '2nd', '3rd', '4th', '5th', '6th', '7th', '8th', '9th', '10th', '11th', '12th','13th','14th','15th','16th','17th','18th','19th','20th','21st','22nd','23rd','24th','25th','26th','27th','28th','29th','30th','31st'],
            datasets: [{
                label: 'Total sold',
                backgroundColor: 'rgb(44, 71, 247)',
                borderColor: 'rgb(44, 71, 247)',
                data: [<?php echo $sales[0] ?>, <?php echo $sales[1] ?>, <?php echo $sales[2] ?>, <?php echo $sales[3] ?>, <?php echo $sales[4] ?>, <?php echo $sales[5] ?>,
                    <?php echo $sales[6] ?>, <?php echo $sales[7] ?>, <?php echo $sales[8] ?>, <?php echo $sales[9] ?>, <?php echo $sales[10] ?>, <?php echo $sales[11] ?>,
                    <?php echo $sales[12] ?>,<?php echo $sales[13] ?>,<?php echo $sales[14] ?>,<?php echo $sales[15] ?>,<?php echo $sales[16] ?>,<?php echo $sales[17] ?>,
                    <?php echo $sales[18] ?>,<?php echo $sales[19] ?>,<?php echo $sales[20] ?>,<?php echo $sales[21] ?>,<?php echo $sales[22] ?>,<?php echo $sales[23] ?>,
                    <?php echo $sales[24] ?>,<?php echo $sales[25] ?>,<?php echo $sales[26] ?>,<?php echo $sales[27] ?>,<?php echo $sales[28] ?>,<?php echo $sales[29] ?>,
                    <?php echo $sales[30] ?>
                ]
            },
                {
                    label: 'Total Invoice',
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: [<?php echo $sale[0] ?>, <?php echo $sale[1] ?>, <?php echo $sale[2] ?>, <?php echo $sale[3] ?>, <?php echo $sale[4] ?>, <?php echo $sale[5] ?>,
                        <?php echo $sale[6] ?>, <?php echo $sale[7] ?>, <?php echo $sale[8] ?>, <?php echo $sale[9] ?>, <?php echo $sale[10] ?>, <?php echo $sale[11] ?>,
                        <?php echo $sale[12] ?>,<?php echo $sale[13] ?>,<?php echo $sale[14] ?>,<?php echo $sale[15] ?>,<?php echo $sale[16] ?>,<?php echo $sale[17] ?>,
                        <?php echo $sale[18] ?>,<?php echo $sale[19] ?>,<?php echo $sale[20] ?>,<?php echo $sale[21] ?>,<?php echo $sale[22] ?>,<?php echo $sale[23] ?>,
                        <?php echo $sale[24] ?>,<?php echo $sale[25] ?>,<?php echo $sale[26] ?>,<?php echo $sale[27] ?>,<?php echo $sale[28] ?>,<?php echo $sale[29] ?>,
                        <?php echo $sale[30] ?>
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
