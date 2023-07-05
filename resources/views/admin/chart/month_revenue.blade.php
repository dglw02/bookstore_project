@extends('layouts.admin_base')

@section('content')

    <h1 class="text-center">Doanh thu theo tháng</h1>
    <canvas id="myChart" height="100px"></canvas>
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script type="text/javascript">

        var labels =  {{ Js::from($labels) }};
        var orders =  {{ Js::from($data) }};

    <?php
    for ($i = 0; $i < 12; $i++) {
        if ($i < 9) {
            $month = '0' . $i + 1;
        } else {
            $month = $i + 1;
        }
        $orders = Illuminate\Support\Facades\DB::table('order_details')
            ->join('orders', 'order_details.order_detail_id', '=', 'orders.orders_id')
            ->where('orders.orders_status', '<', 4)
            ->where('orders.orders_status', '>', 0)
            ->where('orders.created_at', 'like', '%' . '-' . $month . '-' . '%')
            ->select('order_details.*')
            ->get();
        $sales[$i] = 0;
        foreach ($orders as $order) {
            $sales[$i] = $sales[$i] + ($order->price * $order->quantity);

        }
    }
    ?>
        const data = {
            labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
            datasets: [{
                label: 'Tổng tiền bán ra',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data:  [<?php echo $sales[0] ?>, <?php echo $sales[1] ?>, <?php echo $sales[2] ?>, <?php echo $sales[3] ?>, <?php echo $sales[4] ?>, <?php echo $sales[5] ?>,
            <?php echo $sales[6] ?>, <?php echo $sales[7] ?>, <?php echo $sales[8] ?>, <?php echo $sales[9] ?>, <?php echo $sales[10] ?>, <?php echo $sales[11] ?>
        ],
            }]
        };

        const config = {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }}
        };

        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );

    </script>
@endsection
